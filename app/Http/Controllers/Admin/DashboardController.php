<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index() {
        // Step 1: Get the count of orders grouped by year, month, and day
    $orders = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, DAY(created_at) as day, COUNT(*) as order_count')
    ->groupBy('year', 'month', 'day')
    ->orderBy('year')
    ->orderBy('month')
    ->orderBy('day')
    ->get();

// Step 2: Organize the orders into a nested structure using Laravel collections
$result = $orders->groupBy('year')->map(function ($yearOrders) {
    return $yearOrders->groupBy('month')->map(function ($monthOrders) {
        return $monthOrders->groupBy('day')->mapWithKeys(function ($dayOrders, $day) {
            // For each day, we'll return the count of orders
            return [$day => $dayOrders->first()->order_count];
        });
    });
});

// Step 3: Format the months to be in name format (e.g., "January", "February")
$result = $result->map(function ($months) {
    return $months->mapWithKeys(function ($orders, $monthNumber) {
        // Convert month number to month name (e.g., 1 -> "January")
        $monthName = Carbon::createFromFormat('m', $monthNumber)->format('m');
        //return [$monthName => $orders];
        return [$monthNumber => $orders];
    });
});

// Return the final structure as JSON or pass to view
return view('admin.dashboard', compact('result'));
    }
}
