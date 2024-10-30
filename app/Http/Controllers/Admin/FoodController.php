<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\FoodOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    private $indexView = 'admin.foods.all';

    private $storeRoute = 'admin.foods';

    private $editView = 'admin.foods.edit';

    private $deleteRoute = 'admin.foods';

    private $deleteMessage = 'Food deleted successfully.';

    private $createMessage = 'Food created successfully.';

    private $updateMessage = 'Food updated successfully.';

    private $columns = ['id' => 'ID', 'name' => 'Name', 'images' => 'Image', 'price' => 'Price', 'created_at' => 'Created At'];

    private $foodOrderColumns = ['id' => 'ID', 'order_id' => 'Order ID', 'name' => 'Name', 'email' => 'Email', 'mobile' => 'Mobile', 'location' => 'Location', 'flat_no' => 'Flat / Room No', 'message' => 'Message', 'order_amount'=>'Order Amount','order_status' => 'Order Status', 'created_at' => 'Created At'];

    private $fields = [
        [
            'id' => 'name',
            'name' => 'name',
            'type' => 'text',
            'label' => "Food's Name",
            'placeholder' => "Food's Name",
        ],
        [
            'id' => 'description',
            'name' => 'description',
            'type' => 'textarea',
            'label' => "Food's Description",
            'placeholder' => "Food's Description",
        ],
        [
            'id' => 'price',
            'name' => 'price',
            'type' => 'text',
            'label' => "Food's Price",
            'placeholder' => "Food's Price",
        ],
        [
            'id' => 'foodImage',
            'name' => 'image[]',
            'type' => 'file',
            'label' => 'Food Image',
            'placeholder' => 'Food Image',
        ],
    ];

    private $statusOptions = ['pending' => 'Pending', 'completed' => 'Completed', 'failed' => 'Failed'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Food::with(['images'])->get();
        $foodOrders = FoodOrder::with(['order'])->get();

        return view($this->indexView, ['columns' => $this->columns, 'fields' => $this->fields, 'edit' => false, 'records' => $records, 'model' => null, 'foodOrders' => $foodOrders, 'foodOrderColumns' => $this->foodOrderColumns, 'statusOptions' => $this->statusOptions, 'updateRoute' => 'admin.orders.update']);
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
            'review' => 'nullable|numeric',
            'rating' => 'nullable|numeric',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'seo_title' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string',
        ]);

        $food = Food::create($validatedData);
        // Handle file uploads if provided
        if ($request->hasFile('image')) {
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'image', 'uploads/foods');
            // Save each file path to the database in one go
            $food->images()->createMany($fileData);
        }

        return redirect()->route($this->storeRoute)->with('success', $this->createMessage);
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        return view($this->editView, ['columns' => $this->columns, 'fields' => $this->fields, 'model' => $food, 'edit' => true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $food)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'review' => 'nullable|numeric',
            'rating' => 'nullable|numeric',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'seo_title' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string',
        ]);

        // Update product fields
        $food->update($validatedData);

        // Handle file uploads if provided
        if ($request->hasFile('image')) {
            // Remove old files associated with the product
            $this->removeOldFiles($food, 'images', 'uploads');
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'image', 'uploads/foods');

            // Save each file path to the database in one go
            $food->images()->createMany($fileData);
        }

        return redirect()->route($this->storeRoute)->with('success', $this->updateMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        $this->removeOldFiles($food, 'images', 'uploads');
        $food->delete();

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
