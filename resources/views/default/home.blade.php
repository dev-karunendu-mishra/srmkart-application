@extends('default.layout')
@section('main')

@push('style')
<link rel="stylesheet" type="text/css" href="/assets/css/demo1.min.css">
@endPush

<main class="main">
    <div class="page-content">
        <section class="intro-section">
            @include('default.includes.home-sliders-section')
            <div class="container mt-6 appear-animate">
                <div class="service-list">
                    <div class="owl-carousel owl-theme row cols-lg-3 cols-sm-2 cols-1" data-owl-options="{
                                'items': 3,
                                'nav': false,
                                'dots': false,
                                'loop': true,
                                'autoplay': false,
                                'autoplayTimeout': 5000,
                                'responsive': {
                                    '0': {
                                        'items': 1
                                    },
                                    '576': {
                                        'items': 2
                                    },
                                    '768': {
                                        'items': 3,
                                        'loop': false
                                    }
                                }
                            }">
                        <div class="icon-box icon-box-side icon-box1 appear-animate" data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'delay': '.3s'
                                }">
                            <i class="icon-box-icon d-icon-truck"></i>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title text-capitalize ls-normal lh-1">Free Shipping &amp;
                                    Return
                                </h4>
                                <p class="ls-s lh-1">Free shipping on orders over ₹99</p>
                            </div>
                        </div>
                        <div class="icon-box icon-box-side icon-box2 appear-animate" data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'delay': '.4s'
                                }">
                            <i class="icon-box-icon d-icon-service"></i>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title text-capitalize ls-normal lh-1">Customer Support 24/7
                                </h4>
                                <p class="ls-s lh-1">Instant access to perfect support</p>
                            </div>
                        </div>
                        <div class="icon-box icon-box-side icon-box3 appear-animate" data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'delay': '.5s'
                                }">
                            <i class="icon-box-icon d-icon-secure"></i>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title text-capitalize ls-normal lh-1">100% Secure Payment
                                </h4>
                                <p class="ls-s lh-1">We ensure secure payment!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('default.includes.home-services-section')

        @include('default.includes.home-food-section')

        <section class="banner-group mt-4">
            <div class="container">
                <h2 class="title d-none">Banner Group</h2>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="banner banner-3 overlay-zoom banner-fixed banner-radius content-middle appear-animate"
                            data-animation-options="{'name': 'fadeInLeftShorter', 'duration': '1s', 'delay': '.2s'}">
                            <figure>
                                <img src="/assets/images/printout.jpg" alt="banner" width="380"
                                    height="207" style="background-color: #836648;">
                            </figure>
                            <div class="banner-content">
                                <h3 class="banner-title text-white mb-1">PrintOut</h3>
                                <!-- <h4 class="banner-subtitle text-uppercase font-weight-normal text-white">
                                    Starting at ₹29
                                </h4> -->
                                <hr class="banner-divider">
                                <a href="/printout" class="btn btn-white btn-link btn-underline">PrintOut<i
                                        class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 mb-4 order-lg-auto order-sm-last">
                        <div class="banner banner-4 banner-fixed banner-radius overlay-effect2 content-middle content-center appear-animate"
                            data-animation-options="{'name': 'fadeIn', 'duration': '1s', 'delay': '.2s'}">
                            <figure>
                                <img src="/assets/images/furniture.webp" alt="banner" width="380"
                                    height="207" style="background-color: #1e1e1e;">
                            </figure>
                            <div class="banner-content d-flex flex-column align-items-center w-100 text-left">
                                <div class="mb-4 mb-md-0">
                                    <!-- <h4 class="banner-subtitle text-white">
                                        Up to 20% Off<br><span class="ls-l">Black Friday</span>
                                    </h4> -->
                                    <h3 class="banner-title text-primary font-weight-bold lh-1 mb-0">Furniture</h3>
                                </div>
                                <a href="/furniture"
                                    class="btn btn-primary btn-outline btn-rounded font-weight-bold text-white">Furniture<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="banner overlay-zoom banner-5 banner-fixed banner-radius content-middle appear-animate"
                            data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                            <figure>
                                <img src="/assets/images/assignment.jpg" alt="banner" width="380"
                                    height="207" style="background-color: #97928b;">
                            </figure>
                            <div class="banner-content">
                                <h3 class="banner-title text-white mb-1">Assignment</h3>
                                <!-- <h4 class="banner-subtitle text-uppercase font-weight-normal text-white">30% Off
                                </h4> -->
                                <hr class="banner-divider">
                                <a href="/assignment" class="btn btn-white btn-link btn-underline">Assignment<i
                                        class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('default.includes.home-properties-section')


        <section class="banner banner-background parallax text-center" data-option="{'offset': -60}"
            data-image-src="/assets/images/demos/demo1/parallax.jpg" style="background-color: #2d2f33;">
            <div class="container">
                <div class="banner-content appear-animate"
                    data-animation-options="{'name': 'blurIn', 'duration': '1s', 'delay': '.2s'}">
                    <h4 class="banner-subtitle text-white font-weight-bold ls-l">
                        Extra<span class="d-inline-block label-star bg-dark text-primary ml-4 mr-2">30%
                            Off</span>Online
                    </h4>
                    <h3 class="banner-title font-weight-bold text-white">Summer Season Sale</h3>
                    <p class="text-white ls-s">Free shipping on orders over ₹99</p>
                    <a href="shop.html" class="btn btn-primary btn-rounded btn-icon-right">Shop Now<i
                            class="d-icon-arrow-right"></i></a>
                </div>
            </div>
        </section>

        @include('default.includes.home-furnitures-section')

        @include('default.includes.home-bikes-section')
    </div>
</main>

@endsection