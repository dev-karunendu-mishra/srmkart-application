@extends('default.layout')
@push('style')
<link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">
@endpush
@section('main')
<main class="main order">
    <div class="page-header pl-4 pr-4" style="background-image: url(/assets/images/page-header/about-us.jpg)">
        <h3 class="page-subtitle font-weight-bold">{{$pageData->title}}</h3>
        <!--<h1 class="page-title font-weight-bold lh-1 text-white text-capitalize">Internships</h1>-->
        <!--<p class="page-desc text-white mb-0">Lorem quis bibendum auctor, nisi elit consequat ipsum,<br> nec-->
        <!--    sagittis sem nibh id elit.</p>-->
    </div>
    <div class="container pt-7 pb-10 mb-10">
        {!! $pageData->description !!}
    </div>
</main>
@endsection