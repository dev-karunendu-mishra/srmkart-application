<?php

namespace App\Http\Controllers;

use App\Models\AssignmentWriter;
use Illuminate\Http\Request;

class AssignmentWriterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('default.assignment_writer');
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
            'message' => [
                'nullable',
                'string',
                'regex:/^[\p{L}\s.-]+$/u', // Allows letters, spaces, and some punctuation
            ],
            'attachment.*' => 'file|mimes:pdf,png,docx,jpg,jpeg,webp',
        ]);


        $assignmentWriter = AssignmentWriter::create($validatedData);
        // Handle file uploads if provided
        if ($request->hasFile('attachment')) {
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'attachment', 'uploads/cvs');
            // Save each file path to the database in one go
            $assignmentWriter->images()->createMany($fileData);
        }

        return redirect()->back()->with('success', 'Your request has been saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AssignmentWriter $assignmentWriter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssignmentWriter $assignmentWriter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssignmentWriter $assignmentWriter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignmentWriter $assignmentWriter)
    {
        //
    }
}
