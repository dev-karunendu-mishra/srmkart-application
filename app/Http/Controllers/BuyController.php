<?php

namespace App\Http\Controllers;

use App\Models\BuyOrder;
use App\Models\SellerListing;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellerListings = SellerListing::where('status', 'approved')->get();
        return view('default.buy', compact('sellerListings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BuyOrder $buyOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BuyOrder $buyOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BuyOrder $buyOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BuyOrder $buyOrder)
    {
        //
    }
}
