<?php

namespace App\Http\Controllers;

use App\Models\SellerListing;
use Illuminate\Http\Request;

class SellerListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('default.sell');
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
        $validatedData = $request->validate([
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
            'product_name' => 'required|string',
            'description' => 'nullable|string',
            'additional_details' => 'nullable|string',
            'price' => 'required|numeric',
            'max_price' => 'nullable|numeric',
            'category'=>'required|string',
            'condition'=>'required|string',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'seo_title' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string',
            
        ]);

        $sellerListing = SellerListing::create($validatedData);
        // Handle file uploads if provided
        if ($request->hasFile('image')) {
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'image', 'uploads/sellerListing');
            // Save each file path to the database in one go
            $sellerListing->images()->createMany($fileData);
        }

        return redirect()->back()->with('success', 'Your product listing is under review and will be live shortly');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SellerListing $sellerListing)
    {
        //
    }
}
