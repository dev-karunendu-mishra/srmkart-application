@extends('default.layout')
@section('main')
@push('style')
<link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">
@endpush

<div class="page-header pl-4 pr-4" style="background-image: url(/assets/images/page-header/about-us.jpg)">
    <h3 class="page-subtitle font-weight-bold">Lorem quis bibendum</h3>
    <h1 class="page-title font-weight-bold lh-1 text-white text-capitalize">Join as assignment writer</h1>
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

    <form class="form" method="POST" action="{{ route('assignment_writer.store') }}" enctype="multipart/form-data">
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

                <div id="" class="">
                    <label>Attach Your CV FILE</label>
                    <input name="attachment[]" type="file" class="form-control" multiple/>
                </div>
    
                <textarea name="message" class="form-control pb-2 pt-2" cols="30" rows="5"
                    placeholder="Message"></textarea>
                <button type="submit" class="btn btn-primary btn-rounded btn-order">Submit</button>

            </div>
            <aside class="col-md-6 sticky-sidebar-wrapper">
                <div class="sticky-sidebar mt-1" data-sticky-options="{'bottom': 50}">
                    <div class="summary pt-5">
                        <h2 class="h3 summary-subtitle">Why Join Us?</h2>
                        <ul>
                            <li><strong>Flexible Hours:</strong> Take on assignments that fit around your schedule, so you can keep up with your own studies.</li>
                            <li><strong>Earn and Learn:</strong> Get paid for your skills while enhancing your own academic expertise.</li>
                            <li><strong>Help the Community:</strong> Share your knowledge, assist others with their coursework, and make a positive impact on campus life.</li>
                            <p>If you're dedicated, knowledgeable, and eager to help fellow SRM students succeed, fill out the form below to join our team and become an essential part of SRMKart’s academic support network!</p>
                        </ul>
                    </div>
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