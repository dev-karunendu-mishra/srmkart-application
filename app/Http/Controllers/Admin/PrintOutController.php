<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrintOut;
use Illuminate\Http\Request;

class PrintOutController extends Controller
{
    private $indexView = 'admin.printouts.all';

    private $storeRoute = 'admin.printouts';

    private $editView = 'admin.printouts.edit';

    private $deleteRoute = 'admin.printouts';

    private $deleteMessage = 'Print Out deleted successfully.';

    private $createMessage = 'Print Out created successfully.';

    private $updateMessage = 'Print Out updated successfully.';

    private $columns = ['id' => 'ID', 'name' => 'Name', 'email' => 'Email', 'mobile' => 'Mobile', 'location' => 'Location', 'flat_no' => 'Flat / Room No', 'message' => 'Message', 'slot_deadline' => 'Slot / Deadline', 'images' => 'Attachment', 'created_at' => 'Created At'];

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
        $records = PrintOut::with(['images'])->get();

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
        //
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
        $printOut->delete();

        return redirect()->route($this->deleteRoute)->with('success', $this->deleteMessage);
    }
}
