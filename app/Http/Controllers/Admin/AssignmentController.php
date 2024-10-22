<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    private $indexView = 'admin.assignments.all';

    private $storeRoute = 'admin.assignments';

    private $editView = 'admin.assignments.edit';

    private $deleteRoute = 'admin.assignments';

    private $deleteMessage = 'Assignment deleted successfully.';

    private $createMessage = 'Assignment created successfully.';

    private $updateMessage = 'Assignment updated successfully.';

    private $columns = ['id' => 'ID', 'name' => 'Name', 'email' => 'Email', 'mobile' => 'Mobile', 'message' => 'Message', 'images' => 'Attachment', 'created_at' => 'Created At'];

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
        $records = Assignment::with(['images'])->get();

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
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(Assignment $assignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $assignment)
    {
        $assignment->delete();

        return redirect()->route($this->deleteRoute)->with('success', $this->deleteMessage);
    }
}
