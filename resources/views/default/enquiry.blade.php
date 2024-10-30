@extends('default.layout')
@section('main')
@push('style')
<link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">
@endpush

<div class="page-header pl-4 pr-4" style="background-image: url(/assets/images/page-header/about-us.jpg)">
    <h3 class="page-subtitle font-weight-bold">Lorem quis bibendum</h3>
    <h1 class="page-title font-weight-bold lh-1 text-white text-capitalize">Enquiry</h1>
    <p class="page-desc text-white mb-0">Lorem quis bibendum auctor, nisi elit consequat ipsum,<br> nec
        sagittis sem nibh id elit.</p>
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

    <form class="form" method="POST" action="{{ $formAction }}" enctype="multipart/form-data">
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
                <input type="hidden" name="{{$enquiryFor['service']}}" value="{{$enquiryFor['value']}}"/>
                <label>Name *</label>
                <input type="text" class="form-control" name="name" required>

                <label>Mobile *</label>
                <input type="text" class="form-control" name="mobile" required>

                <label>Email Address *</label>
                <input type="email" class="form-control" name="email" required>

                <!-- <label>Company Name (Optional)</label>
                    <input type="text" class="form-control" name="company-name" required=""> -->

                @if($enquiryFor['service'] != 'internship_id' && $enquiryFor['service'] != 'course_id' && $enquiryFor['service'] != 'property_id')
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
                @endif
               
            </div>
            <aside class="col-md-6 sticky-sidebar-wrapper">
                <div class="sticky-sidebar mt-1" data-sticky-options="{'bottom': 50}">
                    <div class="summary pt-5">
                        <h3 class="title title-simple text-left text-uppercase">Additional Information</h3>

                        <textarea name="message" class="form-control pb-2 pt-2" cols="30" rows="5"
                            placeholder="Message"></textarea>
                        <button type="submit" class="btn btn-dark btn-rounded btn-order">Submit</button>
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