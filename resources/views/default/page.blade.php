@extends('default.layout')
@push('style')
<link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">
@endpush
@section('main')
<main class="main order">
    <div class="container pt-7 pb-10 mb-10">
        {!! $pageData->description !!}
    </div>
</main>
@endsection