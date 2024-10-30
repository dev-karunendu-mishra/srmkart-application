<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Internship;
use App\Models\InternshipEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InternshipController extends Controller
{
    private $indexView = 'admin.internships.all';

    private $storeRoute = 'admin.internships';

    private $editView = 'admin.internships.edit';

    private $deleteRoute = 'admin.internships';

    private $deleteMessage = 'Internship deleted successfully.';

    private $createMessage = 'Internship created successfully.';

    private $updateMessage = 'Internship updated successfully.';

    private $columns = ['id' => 'ID', 'name' => 'Name', 'images' => 'Image', 'price' => 'Price', 'created_at' => 'Created At'];

    private $internshipColumns = ['id' => 'ID', 'name' => 'Name', 'email' => 'Email', 'mobile' => 'Mobile',  'message' => 'Message', 'created_at' => 'Created At'];

    private $fields = [
        [
            'id' => 'name',
            'name' => 'name',
            'type' => 'text',
            'label' => "Internship's Name",
            'placeholder' => "Internship's Name",
        ],
        [
            'id' => 'description',
            'name' => 'description',
            'type' => 'textarea',
            'label' => "Internship's Description",
            'placeholder' => "Internship's Description",
        ],
        [
            'id' => 'price',
            'name' => 'price',
            'type' => 'text',
            'label' => "Internship's Price",
            'placeholder' => "Internship's Price",
        ],
        [
            'id' => 'internshipImage',
            'name' => 'image[]',
            'type' => 'file',
            'label' => 'Internship Image',
            'placeholder' => 'Internship Image',
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Internship::with(['images'])->get();
        $internshipEnquiries = InternshipEnquiry::all();

        return view($this->indexView, ['columns' => $this->columns, 'fields' => $this->fields, 'edit' => false, 'records' => $records, 'model' => null, 'internshipColumns' => $this->internshipColumns, 'internshipEnquiries' => $internshipEnquiries]);
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'reviews' => 'nullable|numeric',
            'rating' => 'nullable|numeric',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'seo_title' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string',
        ]);

        $internships = Internship::create($validatedData);
        // Handle file uploads if provided
        if ($request->hasFile('image')) {
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'image', 'uploads/internships');
            // Save each file path to the database in one go
            $internships->images()->createMany($fileData);
        }

        return redirect()->route($this->storeRoute)->with('success', $this->createMessage);
    }

    /**
     * Display the specified resource.
     */
    public function show(Internship $internship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Internship $internship)
    {
        return view($this->editView, ['columns' => $this->columns, 'fields' => $this->fields, 'model' => $internship, 'edit' => true]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Internship $internship)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'reviews' => 'nullable|numeric',
            'rating' => 'nullable|numeric',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'seo_title' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string',
        ]);

        // Update product fields
        $internship->update($validatedData);

        // Handle file uploads if provided
        if ($request->hasFile('image')) {
            // Remove old files associated with the product
            $this->removeOldFiles($internship, 'images', 'uploads');
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'image', 'uploads/internships');

            // Save each file path to the database in one go
            $internship->images()->createMany($fileData);
        }

        return redirect()->route($this->storeRoute)->with('success', $this->updateMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Internship $internship)
    {
        $this->removeOldFiles($internship, 'images', 'uploads');
        $internship->delete();

        return redirect()->route($this->deleteRoute)->with('success', $this->deleteMessage);
    }

    public function deleteImage($imageId)
    {
        // Find the image by ID
        $image = Image::findOrFail($imageId);

        // Delete the image file from storage
        if (Storage::disk('uploads')->exists($image->path)) {
            Storage::disk('uploads')->delete($image->path);
        }

        // Delete the image record from the database
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
