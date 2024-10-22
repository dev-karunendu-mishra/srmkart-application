@extends('default.layout')
@section('main')
@push('style')
<link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">
@endpush

    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/"><i class="d-icon-home"></i></a></li>
                <li>Print</li>
            </ul>
        </div>
    </nav>
    <div class="page-header pl-4 pr-4" style="background-image: url(/assets/images/page-header/about-us.jpg)">
        <h3 class="page-subtitle font-weight-bold">Welcome to SRMKART</h3>
        <h1 class="page-title font-weight-bold lh-1 text-white text-capitalize">Print</h1>
        <p class="page-desc text-white mb-0">Lorem quis bibendum auctor, nisi elit consequat ipsum,<br> nec
            sagittis sem nibh id elit.</p>
    </div>

    <div class="container mt-7 mb-7">
        <form action="#" class="form">
            <div class="row">
                <div class="col-md-6 mb-6 mb-lg-0 pr-lg-4">
                    <h3 class="title title-simple text-left text-uppercase">Basic Details</h3>
                    <div class="row">
                        <div class="col-xs-6">
                            <label>First Name *</label>
                            <input type="text" class="form-control" name="first-name" required="">
                        </div>
                        <div class="col-xs-6">
                            <label>Last Name *</label>
                            <input type="text" class="form-control" name="last-name" required="">
                        </div>
                    </div>

                    <label>Phone *</label>
                    <input type="text" class="form-control" name="phone" required="">
                    
                    <label>Email Address *</label>
                    <input type="email" class="form-control" name="email-address" required="">
                    
                    <label>Location *</label>
                    <select id="main-category" onchange="updateSubCategory()" class="form-control">
                        <option value="hostel" selected="">Hostel</option>
                        <option value="estancia">Estancia</option>
                        <option value="abode">Abode</option>
                    </select>

                    <label for="sub-category">Sub location *</label>
                    <select id="sub-category" class="form-control">
                    <!-- Options will be dynamically added here -->
                    </select>
                    
                    <label>Flat No. / Room No. *</label>
                    <input type="text" class="form-control" name="email-address" required="">
                    
                </div>
                <aside class="col-md-6 sticky-sidebar-wrapper">
                    <div class="sticky-sidebar mt-1" data-sticky-options="{'bottom': 50}">
                        <div class="summary pt-5">
                            <h3 class="title title-simple text-left text-uppercase">Additional Information</h3>

                            <div class="pb-5">
                                <h4 class="h4 summary-subtitle pt-0">Select Slot</h4>
                                <!-- <label>Location *</label> -->
                                <select name="location" class="form-control">
                                    <option value="am" selected="">AM</option>
                                    <option value="pm">PM</option>
                                </select>

                                <div class="custom-radio">
                                    <input type="radio" id="slotOne" name="slots"
                                        class="custom-control-input" checked="">
                                    <label class="custom-control-label"
                                        for="slotOne">2-3</label>
                                </div>
                                <div class="custom-radio">
                                    <input type="radio" id="slotTwo"
                                        name="slots" class="custom-control-input">
                                    <label class="custom-control-label"
                                        for="slotTwo">5-6</label>
                                </div>
                                <div class="custom-radio">
                                    <input type="radio" id="slotThree"
                                        name="slots" class="custom-control-input">
                                    <label class="custom-control-label"
                                        for="slotThree">8-9</label>
                                </div>
                            </div>

                            <label>Attach file *</label>
                            <input type="file" class="form-control" name="file" required="">
                            
                            <textarea class="form-control pb-2 pt-2" cols="30" rows="5"
                                placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                            <button type="submit" class="btn btn-dark btn-rounded btn-order">Submit</button>
                        </div>
                    </div>
                </aside>
            </div>
        </form>
    </div>

@endsection