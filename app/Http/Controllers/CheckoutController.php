<?php

namespace App\Http\Controllers;

use App\Models\FoodOrder;
use App\Models\Order;
use App\Models\OrderPaymentDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Events\OrderCreated;

class CheckoutController extends Controller
{
    public function index()
    {
        $slotOptions = [
            (object) ['label' => '2-3 AM', 'value' => '2-3 AM'],
            (object) ['label' => '5-6 AM', 'value' => '5-6 AM'],
            (object) ['label' => '8-9 AM', 'value' => '8-9 AM'],
            (object) ['label' => '11-12 AM', 'value' => '11-12 AM'],
            (object) ['label' => '2-3 PM', 'value' => '2-3 PM'],
            (object) ['label' => '5-6 PM', 'value' => '5-6 PM'],
            (object) ['label' => '8-9 PM', 'value' => '8-9 PM'],
            (object) ['label' => '11-12 PM', 'value' => '11-12 PM'],
        ];

        $boysHostel = [
            "Paari",
            "Kaari",
            "Oori",
            "Adhiyaman",
            "Nelson Mandela",
            "Manoranjitham",
            "Mullai",
            "Thamarai",
            "Malligai",
            "Sannasi A",
            "Sannasi C",
            "Began",
            "Pierre Fauchard"
        ];
    
        $girlsHostel = [
            "M Block",
            "Senbagam Block",
            "ESQ A Block",
            "ESQ B Block",
            "Kalpana Chawla Hostel",
            "Meenakshi Hostel"
        ];
    
        // Combine the hostels
        $hostels = array_merge($boysHostel, $girlsHostel);

        $estanciaOptions = collect(range(1, 5))->map(function ($i) {
            return "Tower $i";
        });
    
        $abodeOptions = collect(range(65, 90))->filter(function ($i) {
            return !in_array($i, [73, 79, 85, 88]); // Skip certain blocks
        })->map(function ($i) {
            return "Block " . chr($i);
        });

        $lastOrder = Order::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first();
        $lastFoodOrder = !empty($lastOrder->foodOrder) ? $lastOrder->foodOrder : null;
        $location = null;
        if(!empty($lastFoodOrder->hostel)) {
            $location = 'hostel';
        } else  if(!empty($lastFoodOrder->estancia)) {
            $location = 'estancia';
        } else  if(!empty($lastFoodOrder->abode)) {
            $location = 'abode';
        }

        if(Cart::count() == 0) {
            return redirect(route('home'));
        }
        return view('default.checkout', compact('slotOptions', 'location', 'hostels', 'estanciaOptions', 'abodeOptions', 'lastOrder', 'lastFoodOrder'));
    }

    public function checkout(Request $request)
    {
        // Check if the user is authenticated
        if (! auth()->check()) {
            return redirect()->route('/')->with('error', 'You need to be logged in to proceed with checkout.');
        }
        // Validate the request
        $validatedData = $request->validate([
            'payment_method' => 'required|string',
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[\p{L}\s.]+$/u', // Allows letters, spaces, and periods only
            ],
            'mobile' => [
                'required',
                'regex:/^\+?\d{10,15}$/', // Optional '+' and 10 to 15 digits
            ],
            'email' => 'required|string|email|max:255',
            'location' => 'required|string',
            'hostel' => 'nullable|string',
            'estancia' => 'nullable|string',
            'abode' => 'nullable|string',
            'flat_no' => [
                'required',
                'string',
                //'regex:/^[\p{L}\s.-]+$/u', // Allows letters, spaces, and some punctuation
            ],
            'message' => [
                'nullable',
                'string',
                'regex:/^[\p{L}\s.-]+$/u', // Allows letters, spaces, and some punctuation
            ],
            'slot_deadline' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:pdf,png,docx,jpg,jpeg,webp',
        ],[
            //'attachment.required' => 'Payment screenshot is mandatory.',
            'attachment.file' => 'The screenshot must be a valid file.',
            'attachment.mimes' => 'The screenshot must be a file of type: pdf, png, docx, jpg, jpeg, webp.',
        ]);

        // Prepare order items
        $items = [];

        foreach (Cart::content() as $item) {
            $items[] = [
                'product_id' => $item->id,
                'name' => $item->name,
                'quantity' => $item->qty,
                'price' => $item->price,
                'productImage' => $item->options['productImage'],
            ];
        }

        // Create a new order
        $paymentScreenshots = null;
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $fileName = time().'_'.$file->getClientOriginalName();
            $paymentScreenshots = $file->storeAs('uploads/payment_screenshots', $fileName, 'uploads'); // 'uploads' is the storage folder
        }
        $order = Order::create([
            'user_id' => auth()->id(),
            'subtotal' => Cart::subtotal(),
            'tax' => Cart::tax(),
            'discount' => Cart::discount(),
            'delivery_charge' => Cart::total() <= 299 ? 20 : 0 ,
            'total' => Cart::total() <= 299 ? (Cart::total() + 20) : Cart::total() ,
            'payment_status' => 'pending',
            'items' => $items, // Store items as JSON,
            'payment_screenshot' => $paymentScreenshots
        ]);

        // Billing details
        $validatedData['order_id'] = $order->id;
        $billingDetails = FoodOrder::create($validatedData);

        // Process payment (you'll need to implement the payment logic)
        $payment = OrderPaymentDetail::create([
            'order_id' => $order->id,
            'payment_method' => $request->payment_method,
            'amount' => Cart::total(),
            'payment_status' => 'pending', // Change based on payment success
            // 'transaction_id' => '...', // Get from payment gateway
        ]);

        // Clear the cart
        Cart::destroy();
        // Dispatch the OrderCreated event
        event(new OrderCreated($order));

        //Flash success message
        $request->session()->flash('status', 'Your order has been placed successfully!');

        //return response()->json(['message' => 'Order placed successfully!', 'order_id' => $order->id]);
        return redirect()->route('thankyou')->with(['order' => $order]);
    }
}
