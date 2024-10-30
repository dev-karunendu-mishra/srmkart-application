<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    private $indexView = 'admin.courses.all';

    private $storeRoute = 'admin.courses';

    private $editView = 'admin.courses.edit';

    private $deleteRoute = 'admin.courses';

    private $deleteMessage = 'Course deleted successfully.';

    private $createMessage = 'Course created successfully.';

    private $updateMessage = 'Course updated successfully.';

    private $columns = ['id' => 'ID', 'name' => 'Name', 'images' => 'Image', 'price' => 'Price', 'created_at' => 'Created At'];

    private $courseColumns = ['id' => 'ID', 'name' => 'Name', 'email' => 'Email', 'mobile' => 'Mobile',  'message' => 'Message', 'created_at' => 'Created At'];

    private $fields = [
        [
            'id' => 'name',
            'name' => 'name',
            'type' => 'text',
            'label' => "Course's Name",
            'placeholder' => "Course's Name",
        ],
        [
            'id' => 'description',
            'name' => 'description',
            'type' => 'textarea',
            'label' => "Course's Description",
            'placeholder' => "Course's Description",
        ],
        [
            'id' => 'price',
            'name' => 'price',
            'type' => 'text',
            'label' => "Course's Price",
            'placeholder' => "Course's Price",
        ],
        [
            'id' => 'courseImage',
            'name' => 'image[]',
            'type' => 'file',
            'label' => 'Course Image',
            'placeholder' => 'Course Image',
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Course::with(['images'])->get();
        $courseEnquiries = CourseEnquiry::all();

        return view($this->indexView, ['columns' => $this->columns, 'fields' => $this->fields, 'edit' => false, 'records' => $records, 'model' => null, 'courseEnquiries' => $courseEnquiries, 'courseColumns' => $this->courseColumns]);
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

        $courses = Course::create($validatedData);
        // Handle file uploads if provided
        if ($request->hasFile('image')) {
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'image', 'uploads/courses');
            // Save each file path to the database in one go
            $courses->images()->createMany($fileData);
        }

        return redirect()->route($this->storeRoute)->with('success', $this->createMessage);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view($this->editView, ['columns' => $this->columns, 'fields' => $this->fields, 'model' => $course, 'edit' => true]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
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
        $course->update($validatedData);

        // Handle file uploads if provided
        if ($request->hasFile('image')) {
            // Remove old files associated with the product
            $this->removeOldFiles($course, 'images', 'uploads');
            // Upload multiple files and get the file data
            $fileData = $this->uploadMultipleFiles($request, 'image', 'uploads/courses');

            // Save each file path to the database in one go
            $course->images()->createMany($fileData);
        }

        return redirect()->route($this->storeRoute)->with('success', $this->updateMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $this->removeOldFiles($course, 'images', 'uploads');
        $course->delete();

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
