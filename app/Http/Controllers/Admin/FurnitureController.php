<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Furniture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FurnitureController extends Controller
{
    private $indexView = 'admin.furniture.all';

    private $storeRoute = 'admin.furniture';

    private $editView = 'admin.furniture.edit';

    private $deleteRoute = 'admin.furniture';

    private $deleteMessage = 'Furniture deleted successfully.';

    private $createMessage = 'Furniture created successfully.';

    private $updateMessage = 'Furniture updated successfully.';

    private $columns = ['id' => 'ID', 'name' => 'Name', 'images' => 'Image', 'price' => 'Price', 'created_at' => 'Created At'];

    private $fields = [
        [
            'id' => 'name',
            'name' => 'name',
            'type' => 'text',
            'label' => "Furniture's Name",
            'placeholder' => "Furniture's Name",
        ],
        [
            'id' => 'description',
            'name' => 'description',
            'type' => 'textarea',
            'label' => "Furniture's Description",
            'placeholder' => "Furniture's Description",
        ],
        [
            'id' => 'price',
            'name' => 'price',
            'type' => 'text',
            'label' => "Furniture's Price",
            'placeholder' => "Furniture's Price",
        ],
        [
            'id' => 'furnitureImage',
            'name' => 'image[]',
            'type' => 'file',
            'label' => 'Furniture Image',
            'placeholder' => 'Furniture Image',
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Furniture::with(['images'])->get();

        return view($this->indexView, ['columns' => $this->columns, 'fields' => $this->fields, 'edit' => false, 'records' => $records, 'model' => null]);

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
            'price' => 'required|numeric',
            'reviews' => 'nullable|numeric',
            'rating' => 'nullable|numeric',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'seo_title' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string',
        ]);

        $furniture = Furniture::create($validatedData);
        // Handle file uploads if provided
        if ($request->hasFile('image')) {
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'image', 'uploads/furniture');
            // Save each file path to the database in one go
            $furniture->images()->createMany($fileData);
        }

        return redirect()->route($this->storeRoute)->with('success', $this->createMessage);
    }

    /**
     * Display the specified resource.
     */
    public function show(Furniture $furniture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Furniture $furniture)
    {
        return view($this->editView, ['columns' => $this->columns, 'fields' => $this->fields, 'model' => $furniture, 'edit' => true]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Furniture $furniture)
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
        $furniture->update($validatedData);

        // Handle file uploads if provided
        if ($request->hasFile('image')) {
            // Remove old files associated with the product
            $this->removeOldFiles($furniture, 'images', 'uploads');
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'image', 'uploads/furniture');

            // Save each file path to the database in one go
            $furniture->images()->createMany($fileData);
        }

        return redirect()->route($this->storeRoute)->with('success', $this->updateMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Furniture $furniture)
    {
        $this->removeOldFiles($furniture, 'images', 'uploads');
        $furniture->delete();

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
