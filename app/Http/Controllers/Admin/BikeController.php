<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BikeController extends Controller
{
    private $indexView = 'admin.bikes.all';

    private $storeRoute = 'admin.bikes';

    private $editView = 'admin.bikes.edit';

    private $deleteRoute = 'admin.bikes';

    private $deleteMessage = 'Bike deleted successfully.';

    private $createMessage = 'Bike created successfully.';

    private $updateMessage = 'Bike updated successfully.';

    private $columns = ['id' => 'ID', 'name' => 'Name', 'images' => 'Image', 'price' => 'Price', 'created_at' => 'Created At'];

    private $fields = [
        [
            'id' => 'name',
            'name' => 'name',
            'type' => 'text',
            'label' => "Bike's Name",
            'placeholder' => "Bike's Name",
        ],
        [
            'id' => 'description',
            'name' => 'description',
            'type' => 'textarea',
            'label' => "Bike's Description",
            'placeholder' => "Bike's Description",
        ],
        [
            'id' => 'price',
            'name' => 'price',
            'type' => 'text',
            'label' => "Bike's Price",
            'placeholder' => "Bike's Price",
        ],
        [
            'id' => 'bikeImage',
            'name' => 'image[]',
            'type' => 'file',
            'label' => 'Bike Image',
            'placeholder' => 'Bike Image',
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Bike::with(['images'])->get();

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

        $bikes = Bike::create($validatedData);
        // Handle file uploads if provided
        if ($request->hasFile('image')) {
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'image', 'uploads/bikes');
            // Save each file path to the database in one go
            $bikes->images()->createMany($fileData);
        }

        return redirect()->route($this->storeRoute)->with('success', $this->createMessage);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bike $bike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bike $bike)
    {
        return view($this->editView, ['columns' => $this->columns, 'fields' => $this->fields, 'model' => $bike, 'edit' => true]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bike $bike)
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
        $bike->update($validatedData);

        // Handle file uploads if provided
        if ($request->hasFile('image')) {
            // Remove old files associated with the product
            $this->removeOldFiles($bike, 'images', 'uploads');
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'image', 'uploads/bikes');

            // Save each file path to the database in one go
            $bike->images()->createMany($fileData);
        }

        return redirect()->route($this->storeRoute)->with('success', $this->updateMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bike $bike)
    {
        $this->removeOldFiles($bike, 'images', 'uploads');
        $bike->delete();

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
