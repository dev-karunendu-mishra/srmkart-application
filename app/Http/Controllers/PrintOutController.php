<?php

namespace App\Http\Controllers;

use App\Models\PrintOut;
use Illuminate\Http\Request;

class PrintOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        return view('default.printout', compact('slotOptions'));
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
            // 'slot_deadline' => 'required|string',
            // 'attachment.*' => 'file|mimes:pdf,png,docx,jpg,jpeg,webp',
        ]);

        // $validatedData['hostel'] = null;
        // $validatedData['estancia'] = null;
        // $validatedData['abode'] = null;

        // $validatedData[$validatedData['location']] = $request[$validatedData['location']];

        $assignment = PrintOut::create($validatedData);
        // Handle file uploads if provided
        // if ($request->hasFile('attachment')) {
        //     // Upload multiple files and get the file data
        //     $fileData = $this->uploadMultipleFiles($request, 'attachment', 'uploads/printouts');
        //     // Save each file path to the database in one go
        //     $assignment->images()->createMany($fileData);
        // }

        return redirect()->back()->with('success', 'Your enquiry has been saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PrintOut $printOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrintOut $printOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PrintOut $printOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrintOut $printOut)
    {
        //
    }
}
