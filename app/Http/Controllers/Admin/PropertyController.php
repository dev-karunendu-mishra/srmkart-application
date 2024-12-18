<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    private $indexView = 'admin.properties.all';

    private $storeRoute = 'admin.properties';

    private $editView = 'admin.properties.edit';

    private $deleteRoute = 'admin.properties';

    private $deleteMessage = 'Property deleted successfully.';

    private $createMessage = 'Property created successfully.';

    private $updateMessage = 'Property updated successfully.';

    private $columns = ['id' => 'ID', 'name' => 'Name', 'images' => 'Image', 'price' => 'Price', 'location' => 'Location', 'flat_type' => "Flat's Type", 'vacancy' => 'Vacancy', 'status' => 'Status', 'created_at' => 'Created At'];

    private $propertyEnquiryColumns = ['id' => 'ID', 'property_id'=>"Property", 'name' => 'Name', 'email' => 'Email', 'mobile' => 'Mobile',  'message' => 'Message', 'created_at' => 'Created At'];

    private $statusOptions = ['active' => 'Active', 'sold' => 'Sold'];

    private $fields = [
        [
            'id' => 'name',
            'name' => 'name',
            'type' => 'text',
            'label' => "Property's Name",
            'placeholder' => "Property's Name",
        ],
        [
            'id' => 'description',
            'name' => 'description',
            'type' => 'textarea',
            'label' => "Property's Description",
            'placeholder' => "Property's Description",
        ],
        [
            'id' => 'price',
            'name' => 'price',
            'type' => 'text',
            'label' => "Property's Price",
            'placeholder' => "Property's Price",
        ],
        'location' => [
            'id' => 'location',
            'name' => 'location',
            'type' => 'select',
            'label' => "Property's Location",
            'placeholder' => "Property's Location",
        ],
        'flat_type' => [
            'id' => 'flat_type',
            'name' => 'flat_type',
            'type' => 'select',
            'label' => "Flat's Type",
            'placeholder' => "Flat's Type",
            'options' => [],
        ],
        'vacancy' => [
            'id' => 'vacancy',
            'name' => 'vacancy',
            'type' => 'text',
            'label' => 'Vacancy',
            'placeholder' => 'Vacancy',
        ],
        'status' => [
            'id' => 'status',
            'name' => 'status',
            'type' => 'select',
            'label' => "Property's Status",
            'placeholder' => "Property's Status",
        ],
        [
            'id' => 'propertyImage',
            'name' => 'image[]',
            'type' => 'file',
            'label' => 'Property Image',
            'placeholder' => 'Property Image',
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Property::with(['images'])->get();
        $propertyEnquiries = PropertyEnquiry::orderBy('created_at', 'desc')->get();
        $this->fields['location']['options'] = (object) [(object) ['id' => 'Estancia', 'name' => 'Estancia'], (object) ['id' => 'Abode', 'name' => 'Abode']];
        $this->fields['status']['options'] = (object) [(object) ['id' => 'active', 'name' => 'Active'], (object) ['id' => 'sold', 'name' => 'Sold']];

        return view($this->indexView, ['columns' => $this->columns, 'fields' => $this->fields, 'edit' => false, 'records' => $records, 'model' => null, 'propertyEnquiries' => $propertyEnquiries, 'propertyEnquiryColumns' => $this->propertyEnquiryColumns, 'statusOptions' => $this->statusOptions]);

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
            'location' => 'required|string',
            'flat_type' => 'required|string',
            'status' => 'nullable|string',
            'vacancy' => 'nullable|numeric',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'seo_title' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string',
        ]);

        $properties = Property::create($validatedData);
        // Handle file uploads if provided
        if ($request->hasFile('image')) {
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'image', 'uploads/properties');
            // Save each file path to the database in one go
            $properties->images()->createMany($fileData);
        }

        return redirect()->route($this->storeRoute)->with('success', $this->createMessage);
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $this->fields['location']['options'] = (object) [(object) ['id' => 'Estancia', 'name' => 'Estancia'], (object) ['id' => 'Abode', 'name' => 'Abode']];
        $this->fields['status']['options'] = (object) [(object) ['id' => 'active', 'name' => 'Active'], (object) ['id' => 'sold', 'name' => 'Sold']];

        return view($this->editView, ['columns' => $this->columns, 'fields' => $this->fields, 'model' => $property, 'edit' => true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'reviews' => 'nullable|numeric',
            'rating' => 'nullable|numeric',
            'location' => 'nullable|string',
            'flat_type' => 'nullable|string',
            'status' => 'nullable|string',
            'vacancy' => 'nullable|numeric',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'seo_title' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string',
        ]);

        // Update product fields
        $property->update($validatedData);

        // Handle file uploads if provided
        if ($request->hasFile('image')) {
            // Remove old files associated with the product
            $this->removeOldFiles($property, 'images', 'uploads');
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'image', 'uploads/properties');

            // Save each file path to the database in one go
            $property->images()->createMany($fileData);
        }

        return redirect()->route($this->storeRoute)->with('success', $this->updateMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $this->removeOldFiles($property, 'images', 'uploads');
        $property->delete();

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
