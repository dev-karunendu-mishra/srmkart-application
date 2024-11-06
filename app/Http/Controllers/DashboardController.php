<?php

namespace App\Http\Controllers;
use App\Models\FoodOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if(auth()->user()->hasRole('restaurant')) {
            $orderHistory = FoodOrder::with(['order'])->orderBy('created_at', 'desc')->get();
            $foodOrderColumns = ['id' => 'ID', 'order_id' => 'Order ID', 'name' => 'Name', 'email' => 'Email', 'mobile' => 'Mobile', 'location' => 'Location', 'flat_no' => 'Flat / Room No', 'message' => 'Message', 'order_amount'=>'Order Amount','order_status' => 'Order Status', 'created_at' => 'Created At'];
            $statusOptions = ['pending' => 'Pending', 'completed' => 'Completed', 'failed' => 'Failed'];
            $updateRoute = 'orders.update';
            return view('dashboard.home', compact('orderHistory' , 'foodOrderColumns' , 'statusOptions', 'updateRoute'));
        } else {
            $orderHistory = Order::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
            $foodOrderColumns = ['id' => 'ID', 'order_id' => 'Order ID', 'subtotal'=>'Sub Total','discount'=>'Discount','tax'=>'Tax', 'delivery_charge'=>'Delivery Charge' ,'total'=>'Total','created_at' => 'Created At'];    
            return view('dashboard.home', compact('orderHistory' , 'foodOrderColumns'));
        }
       
    }
}
