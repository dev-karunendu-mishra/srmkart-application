<?php

namespace App\Http\Controllers;

use App\Models\FoodOrder;
use App\Models\Order;
use App\Models\OrderPaymentDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('default.checkout');
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
                'regex:/^[0-9]\d{9}$/',
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
            'attachment.*' => 'nullable|file|mimes:pdf',
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
        $order = Order::create([
            'user_id' => auth()->id(),
            'subtotal' => Cart::subtotal(),
            'tax' => Cart::tax(),
            'discount' => Cart::discount(),
            'total' => Cart::total(),
            'payment_status' => 'pending',
            'items' => $items, // Store items as JSON
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

        //Flash success message
        $request->session()->flash('status', 'Your order has been placed successfully!');

        //return response()->json(['message' => 'Order placed successfully!', 'order_id' => $order->id]);
        return redirect()->route('thankyou')->with(['order' => $order]);
    }
}
