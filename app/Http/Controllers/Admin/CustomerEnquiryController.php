<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryAgent;
use App\Models\AssignmentWriter;
use App\Models\Essentials;
use Illuminate\Http\Request;

class CustomerEnquiryController extends Controller
{
    private $deliveryAgentEnquiriesColumns = ['id' => 'ID', 'name' => 'Name', 'email' => 'Email', 'mobile' => 'Mobile','message' => 'Message', 'attachments' => 'Attachment','created_at' => 'Created At'];

    private $assignmentWriterEnquiriesColumns = ['id' => 'ID', 'name' => 'Name', 'email' => 'Email', 'mobile' => 'Mobile', 'message' => 'Message','attachments' => 'Attachment', 'created_at' => 'Created At'];

    private $essentialEnquiriesColumns = ['id' => 'ID', 'name' => 'Name', 'email' => 'Email', 'mobile' => 'Mobile', 'location' => 'Location', 'flat_no' => 'Flat / Room No', 'message' => 'Message',   'created_at' => 'Created At'];

    // 'subTotal' => 'SubTotal', 'tax' => 'Tax', 'discount' => 'Discount', 'total' => 'Total',
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveryAgentEnquiries = DeliveryAgent::orderBy('created_at', 'desc')->get();
        $assignmentWriterEnquiries = AssignmentWriter::orderBy('created_at', 'desc')->get();
        $essentialEnquiries = Essentials::orderBy('created_at', 'desc')->get();
        $deliveryAgentEnquiriesColumns = $this->deliveryAgentEnquiriesColumns;
        $assignmentWriterEnquiriesColumns = $this->assignmentWriterEnquiriesColumns;
        $essentialEnquiriesColumns = $this->essentialEnquiriesColumns;


        return view('admin.customer-enquiry.all', compact('deliveryAgentEnquiries', 'assignmentWriterEnquiries', 'essentialEnquiries','deliveryAgentEnquiriesColumns', 'assignmentWriterEnquiriesColumns','essentialEnquiriesColumns'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
