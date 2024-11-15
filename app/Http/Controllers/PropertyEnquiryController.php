<?php

namespace App\Http\Controllers;

use App\Models\PropertyEnquiry;
use Illuminate\Http\Request;

class PropertyEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'property_id' => 'required|exists:properties,id',
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
            // 'location' => 'required|string',
            // 'hostel' => 'nullable|string',
            // 'estancia' => 'nullable|string',
            // 'abode' => 'nullable|string',
            // 'flat_no' => [
            //     'required',
            //     'string',
            //     //'regex:/^[\p{L}\s.-]+$/u', // Allows letters, spaces, and some punctuation
            // ],
            'message' => [
                'required',
                'string',
                'regex:/^[\p{L}\s.-]+$/u', // Allows letters, spaces, and some punctuation
            ],
            // 'slot_deadline' => 'nullable|string',
            // 'attachment.*' => 'file|mimes:pdf',
        ]);

        // $validatedData['hostel'] = null;
        // $validatedData['estancia'] = null;
        // $validatedData['abode'] = null;

        // $validatedData[$validatedData['location']] = $request[$validatedData['location']];

        // Check if there is an existing enquiry with the same email, phone, and property_id with status "pending"
        if (PropertyEnquiry::where('email', $request->email)
            ->where('mobile', $request->phone)
            ->where('property_id', $request->property_id)
            ->where('status', 'pending')
            ->exists()) {

            return redirect()->back()->with('error', 'There is already a pending enquiry for this email, phone, and property.');
        }

        $assignment = PropertyEnquiry::create($validatedData);
        // Handle file uploads if provided
        if ($request->hasFile('attachment')) {
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'attachment', 'uploads/enquiries');
            // Save each file path to the database in one go
            $assignment->images()->createMany($fileData);
        }

        return redirect()->back()->with('success', 'Your enquiry has been saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PropertyEnquiry $propertyEnquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyEnquiry $propertyEnquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PropertyEnquiry $propertyEnquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyEnquiry $propertyEnquiry)
    {
        //
    }
}
