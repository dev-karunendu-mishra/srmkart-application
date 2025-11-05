<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SellerListing;
use Illuminate\Http\Request;

class SellerListingController extends Controller
{
    private $sellerListingColumns = ['id' => 'ID', 'name' => 'Name', 'email' => 'Email', 'mobile' => 'Mobile', 'product_name'=>"Product's Name", 'status'=>"Status", 'created_at' => 'Created At'];
    private $statusOptions = ['pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellerListings = SellerListing::orderBy('created_at', 'desc')->get();
        $sellerListingColumns = $this->sellerListingColumns;
        $statusOptions = $this->statusOptions;
        $updateRoute = 'admin.seller_listings.update';
        return view('admin.sellerListings.all', compact('sellerListings', 'sellerListingColumns', 'statusOptions', 'updateRoute'));
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
    public function show(SellerListing $sellerListing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SellerListing $sellerListing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SellerListing $sellerListing)
    {
        $validatedData = $request->validate([
            'status' => 'required|string',
        ]);

        $sellerListing->update($validatedData);

        return redirect()->back()->with([
            'success' => 'Status updated successfully!',
            'order_status' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SellerListing $sellerListing)
    {
        //
    }
}
