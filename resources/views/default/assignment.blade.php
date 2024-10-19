@extends('default.layout')
@section('main')
@push('style')
<link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">
@endpush
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                <li class="text-capitalize">{{!empty($pageClass[Route::currentRouteName()])?$pageClass[Route::currentRouteName()]:''}}</li>
            </ul>
        </div>
    </nav>
    <div class="page-header pl-4 pr-4" style="background-image: url(/assets/images/page-header/about-us.jpg)">
        <h3 class="page-subtitle font-weight-bold">Lorem quis bibendum</h3>
        <h1 class="page-title font-weight-bold lh-1 text-white text-capitalize">{{!empty($pageClass[Route::currentRouteName()])?$pageClass[Route::currentRouteName()]:''}}</h1>
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
                    
                    <!-- <label>Company Name (Optional)</label>
                    <input type="text" class="form-control" name="company-name" required=""> -->
                    <label>Hostel *</label>
                    <select name="country" class="form-control">
                        <option value="us" selected="">United States (US)</option>
                        <option value="uk"> United Kingdom</option>
                        <option value="fr">France</option>
                        <option value="aus">Austria</option>
                    </select>

                    <label>Estancia  *</label>
                    <select name="country" class="form-control">
                        <option value="us" selected="">United States (US)</option>
                        <option value="uk"> United Kingdom</option>
                        <option value="fr">France</option>
                        <option value="aus">Austria</option>
                    </select>

                    <label>Abode  *</label>
                    <select name="country" class="form-control">
                        <option value="us" selected="">United States (US)</option>
                        <option value="uk"> United Kingdom</option>
                        <option value="fr">France</option>
                        <option value="aus">Austria</option>
                    </select>
                    
                    <label>Flat No. / Room No. *</label>
                    <input type="text" class="form-control" name="email-address" required="">
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
                            <h3 class="title title-simple text-left text-uppercase">Additional Information</h3>
                            
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