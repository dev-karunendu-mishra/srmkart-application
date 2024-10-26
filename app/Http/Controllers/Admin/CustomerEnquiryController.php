<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseEnquiry;
use App\Models\FoodOrder;
use App\Models\InternshipEnquiry;
use Illuminate\Http\Request;

class CustomerEnquiryController extends Controller
{
    private $internshipColumns = ['id' => 'ID', 'name' => 'Name', 'email' => 'Email', 'mobile' => 'Mobile', 'location' => 'Location', 'flat_no' => 'Flat / Room No', 'message' => 'Message', 'slot_deadline' => 'Slot / Deadline', 'images' => 'Attachment', 'created_at' => 'Created At'];

    private $courseColumns = ['id' => 'ID', 'name' => 'Name', 'email' => 'Email', 'mobile' => 'Mobile', 'location' => 'Location', 'flat_no' => 'Flat / Room No', 'message' => 'Message', 'slot_deadline' => 'Slot / Deadline', 'images' => 'Attachment', 'created_at' => 'Created At'];

    private $foodOrderColumns = ['id' => 'ID', 'order_id' => 'Order ID', 'name' => 'Name', 'email' => 'Email', 'mobile' => 'Mobile', 'location' => 'Location', 'flat_no' => 'Flat / Room No', 'message' => 'Message',   'created_at' => 'Created At'];

    // 'subTotal' => 'SubTotal', 'tax' => 'Tax', 'discount' => 'Discount', 'total' => 'Total',
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $internshipEnquiries = InternshipEnquiry::all();
        $courseEnquiries = CourseEnquiry::all();
        $foodOrders = FoodOrder::with(['order'])->get();

        return view('admin.customer-enquiry.all', ['internshipEnquiries' => $internshipEnquiries, 'courseEnquiries' => $courseEnquiries, 'foodOrders' => $foodOrders, 'internshipColumns' => $this->internshipColumns, 'courseColumns' => $this->courseColumns, 'foodOrderColumns' => $this->foodOrderColumns]);
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
