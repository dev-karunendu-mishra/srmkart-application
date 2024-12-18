@extends('default.layout')
@section('main')
@push('style')
<link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">
@endpush
<nav class="breadcrumb-nav">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
            <li class="text-capitalize">
                {{!empty($pageClass[Route::currentRouteName()])?$pageClass[Route::currentRouteName()]:''}}</li>
        </ul>
    </div>
</nav>
<div class="page-header pl-4 pr-4" style="background-image: url(/assets/images/page-header/about-us.jpg)">
    <h3 class="page-subtitle font-weight-bold">"Your content, our polish—submit with confidence!"</h3>
    <h1 class="page-title font-weight-bold lh-1 text-white text-capitalize">
        {{!empty($pageClass[Route::currentRouteName()])?$pageClass[Route::currentRouteName()]:''}}</h1>
    <p class="page-desc text-white mb-0">"We know how important assignments are, and we’re here to make them shine. Just provide us with your initial work, and we’ll handle the writing and the grunt."<br>  Let SRMKart take care of the details so you can submit assignments that stand out, every time!</p>
</div>

<div class="container mt-7 mb-7">
    @if (session('success'))
    <div class="alert alert-success text-white mb-3">
        {{ session('success') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger text-white mb-3">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="form" method="POST" action="{{ route('assignment.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-6 mb-lg-0 pr-lg-4">
                <h3 class="title title-simple text-left text-uppercase">Basic Details</h3>
                <!-- <div class="row">
                    <div class="col-xs-6">
                        <label>First Name *</label>
                        <input type="text" class="form-control" name="first-name" required="">
                    </div>
                </div> -->

                <label>Name *</label>
                <input type="text" class="form-control" name="name" required>

                <label>Phone *</label>
                <input type="text" class="form-control" name="mobile" required>

                <label>Email Address *</label>
                <input type="email" class="form-control" name="email" required>

                <!-- <label>Company Name (Optional)</label>
                    <input type="text" class="form-control" name="company-name" required=""> -->
                <label>Location *</label>
                <select name="location" class="form-control" id="location_dd">
                    <option value="NA" selected disabled>Select Location</option>
                    <option value="hostel">Hostel</option>
                    <option value="estancia">Estancia</option>
                    <option value="abode">Abode</option>
                </select>

                <div id="location_hostel" class="location-options d-none">
                    <label>Hostel *</label>
                    <select name="hostel" class="form-control">
                        <option value="NA" selected disabled>Select Hostel</option>
                    </select>
                </div>

                <div id="location_estancia" class="location-options d-none">
                    <label>Estancia *</label>
                    <select name="estancia" class="form-control">
                        <option value="NA" selected disabled>Select Estancia</option>
                    </select>
                </div>

                <div id="location_abode" class="location-options d-none">
                    <label>Abode *</label>
                    <select name="abode" class="form-control">
                        <option value="NA" selected disabled>Select Abode</option>
                    </select>
                </div>

                <label>Flat No. / Room No. *</label>
                <input type="text" class="form-control" name="flat_no" required>
                <!-- <div class="select-box">
                    </div> -->
                <!-- <label>Street Address *</label>
                    <input type="text" class="form-control" name="address1" required=""
                        placeholder="House number and street name">
                    <input type="text" class="form-control" name="address2" required=""
                        placeholder="Apartment, suite, unit, etc. (optional)">
                    <div class="row">
                        <div class="col-xs-6">
                            <label>Town / City *</label>
                            <input type="text" class="form-control" name="city" required="">
                        </div>
                        <div class="col-xs-6">
                            <label>State *</label>
                            <input type="text" class="form-control" name="state" required="">
                        </div>
                    </div> -->
                <!-- <div class="row">
                        <-- <div class="col-xs-6">
                            <label>ZIP *</label>
                            <input type="text" class="form-control" name="zip" required="">
                        </div> ->
                        <div class="col-12">
                            </div>
                        </div>
                    
                    <div class="form-checkbox mb-0">
                        <input type="checkbox" class="custom-checkbox" id="create-account"
                            name="create-account">
                        <label class="form-control-label ls-s" for="create-account">Create an
                            account?</label>
                    </div>
                    <div class="form-checkbox mb-6">
                        <input type="checkbox" class="custom-checkbox" id="different-address"
                            name="different-address">
                        <label class="form-control-label ls-s" for="different-address">Ship to a different
                            address?</label>
                    </div> -->
                <!-- <h2 class="title title-simple text-uppercase text-left">Additional Information</h2>
                    <label>Order Notes (Optional)</label> -->
            </div>
            <aside class="col-md-6 sticky-sidebar-wrapper">
                <div class="sticky-sidebar mt-1" data-sticky-options="{'bottom': 50}">
                    <div class="summary pt-5">
                        <!-- <h3 class="title title-simple text-left text-uppercase">Additional Information</h3> -->


                        <div id="" class="">
                            <label>Deadline *</label>
                            <x-slot-deadline defaultOption="Select Deadline" :slotOptions="$slotOptions"/>
                        </div>

                        <div id="" class="">
                            <label>File Attachment *</label>
                            <input name="attachment[]" type="file" class="form-control" multiple/>
                        </div>

                        <textarea name="message" class="form-control pb-2 pt-2" cols="30" rows="5"
                            placeholder="Message"></textarea>
                        <button type="submit" class="btn btn-primary btn-rounded btn-order">Submit</button>
                    </div>
                </div>
            </aside>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="/assets/js/enquiry_form.js"></script>
@endpush
