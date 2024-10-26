<?php

namespace App\Http\Controllers;

use App\Models\CourseEnquiry;
use Illuminate\Http\Request;

class CourseEnquiryController extends Controller
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
            'course_id' => 'required|exists:courses,id',
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
                'required',
                'string',
                'regex:/^[\p{L}\s.-]+$/u', // Allows letters, spaces, and some punctuation
            ],
            'slot_deadline' => 'nullable|string',
            'attachment.*' => 'nullable|file|mimes:pdf',
        ]);

        $validatedData['hostel'] = null;
        $validatedData['estancia'] = null;
        $validatedData['abode'] = null;

        $validatedData[$validatedData['location']] = $request[$validatedData['location']];

        $assignment = CourseEnquiry::create($validatedData);
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
    public function show(CourseEnquiry $courseEnquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseEnquiry $courseEnquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseEnquiry $courseEnquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseEnquiry $courseEnquiry)
    {
        //
    }
}
