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
                                <img src="/assets/images/demos/demo1/banners/banner1.jpg" alt="banner" width="380"
                                    height="207" style="background-color: #836648;">
                            </figure>
                            <div class="banner-content">
                                <h3 class="banner-title text-white mb-1">For Men's</h3>
                                <h4 class="banner-subtitle text-uppercase font-weight-normal text-white">
                                    Starting at ₹29
                                </h4>
                                <hr class="banner-divider">
                                <a href="shop.html" class="btn btn-white btn-link btn-underline">Shop Now<i
                                        class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 order-lg-auto order-sm-last">
                        <div class="banner banner-4 banner-fixed banner-radius overlay-effect2 content-middle content-center appear-animate"
                            data-animation-options="{'name': 'fadeIn', 'duration': '1s', 'delay': '.2s'}">
                            <figure>
                                <img src="/assets/images/demos/demo1/banners/banner2.jpg" alt="banner" width="350"
                                    height="177" style="background-color: #1e1e1e;">
                            </figure>
                            <div class="banner-content d-flex align-items-center w-100 text-left">
                                <div class="mr-auto mb-4 mb-md-0">
                                    <h4 class="banner-subtitle text-white">
                                        Up to 20% Off<br><span class="ls-l">Black Friday</span>
                                    </h4>
                                    <h3 class="banner-title text-primary font-weight-bold lh-1 mb-0">Sale</h3>
                                </div>
                                <a href="shop.html"
                                    class="btn btn-primary btn-outline btn-rounded font-weight-bold text-white">Shop
                                    Now<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="banner overlay-zoom banner-5 banner-fixed banner-radius content-middle appear-animate"
                            data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                            <figure>
                                <img src="/assets/images/demos/demo1/banners/banner3.jpg" alt="banner" width="380"
                                    height="207" style="background-color: #97928b;">
                            </figure>
                            <div class="banner-content">
                                <h3 class="banner-title text-white mb-1">Fashions</h3>
                                <h4 class="banner-subtitle text-uppercase font-weight-normal text-white">30% Off
                                </h4>
                                <hr class="banner-divider">
                                <a href="shop.html" class="btn btn-white btn-link btn-underline">Shop Now<i
                                        class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="product-wrapper mt-6 mt-md-10 pt-4 mb-10 pb-2 container appear-animate"
            data-animation-options="{ 'delay': '.6s' }">
            <h2 class="title title-center">Our Property</h2>
            <div class="owl-carousel owl-theme row cols-2 cols-md-3 cols-lg-4 cols-xl-5" data-owl-options="{
                    'items': 5,
                    'nav': false,
                    'loop': false,
                    'dots': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '992': {
                            'items': 4
                        },
                        '1200': {
                            'items': 5,
                            'dots': false,
                            'nav': true
                        }
                    }
                }">
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="#">
                            <img src="/assets/images/demos/demo1/products/product5.jpg" alt="Blue Pinafore Denim Dress"
                                width="220" height="245" style="background-color: #f2f3f5;">
                        </a>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Enquiry">Enquiry Now</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="product-cat">
                            <a href="shop-grid-3cols.html">2BHK</a>
                        </div>
                        <h3 class="product-name">
                            <a href="#">Rama galaxy</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:40%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#" class="rating-reviews">( 15 reviews )</a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Enquiry Now">Enquiry Now</a>
                        </div>
                    </div>
                </div>
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="#">
                            <img src="/assets/images/demos/demo1/products/product6.jpg" alt="Blue Pinafore Denim Dress"
                                width="220" height="245" style="background-color: #f2f3f5;">
                        </a>
                        <div class="product-label-group">
                            <label class="product-label label-new">New</label>
                        </div>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Enquiry">Enquiry Now</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="product-cat">
                            <a href="shop-grid-3cols.html">2BHK</a>
                        </div>
                        <h3 class="product-name">
                            <a href="#">Joy lodge</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:40%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#" class="rating-reviews">( 15 reviews )</a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Enquiry Now">Enquiry Now</a>
                        </div>
                    </div>
                </div>
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="#">
                            <img src="/assets/images/demos/demo1/products/product7.jpg" alt="Blue Pinafore Denim Dress"
                                width="220" height="245" style="background-color: #f2f3f5;">
                        </a>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Enquiry">Enquiry Now</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="product-cat">
                            <a href="shop-grid-3cols.html">2BHK/3BHK/KOTHI</a>
                        </div>
                        <h3 class="product-name">
                            <a href="#">Sundaram Tower</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:40%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#" class="rating-reviews">( 15 reviews )</a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Enquiry Now">Enquiry Now</a>
                        </div>
                    </div>
                </div>
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="#">
                            <img src="/assets/images/demos/demo1/products/product8.jpg" alt="Blue Pinafore Denim Dress"
                                width="220" height="245" style="background-color: #f2f3f5;">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-new">New</span>
                        </div>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Enquiry">Enquiry Now</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="product-cat">
                            <a href="shop-grid-3cols.html">2BHK</a>
                        </div>
                        <h3 class="product-name">
                            <a href="#">Rama Homes</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:40%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#" class="rating-reviews">( 15 reviews )</a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Enquiry Now">Enquiry Now</a>
                        </div>
                    </div>
                </div>
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="#">
                            <img src="/assets/images/demos/demo1/products/product9.jpg" alt="Blue Pinafore Denim Dress"
                                width="220" height="245" style="background-color: #f2f3f5;">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">27% Off</span>
                        </div>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Enquiry">Enquiry Now</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="product-cat">
                            <a href="shop-grid-3cols.html">2BHK</a>
                        </div>
                        <h3 class="product-name">
                            <a href="#">Rama Apartment</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:40%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#" class="rating-reviews">( 15 reviews )</a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Enquiry Now">Enquiry Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


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


        <section class="product-wrapper mt-6 mt-md-10 pt-4 mb-10 pb-2 container appear-animate"
            data-animation-options="{ 'delay': '.6s' }">
            <h2 class="title title-center">Furniture</h2>
            <div class="owl-carousel owl-theme row cols-2 cols-md-3 cols-lg-4 cols-xl-5" data-owl-options="{
                    'items': 5,
                    'nav': false,
                    'loop': false,
                    'dots': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '992': {
                            'items': 4
                        },
                        '1200': {
                            'items': 5,
                            'dots': false,
                            'nav': true
                        }
                    }
                }">
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="#">
                            <img src="/assets/images/demos/demo8/products/10.jpg" alt="Blue Pinafore Denim Dress"
                                width="220" height="245" style="background-color: #f2f3f5;">
                        </a>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Enquiry">Enquiry Now</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h3 class="product-name">
                            <a href="demo8-product.html">Original Outdoor Bin</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                        </div>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:100%"></span>
                                <span class="tooltiptext tooltip-top">5.00</span>
                            </div>
                            <a href="demo8-product.html" class="rating-reviews">( 6 reviews )</a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Enquiry Now">Enquiry Now</a>
                        </div>
                    </div>
                </div>
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="#">
                            <img src="/assets/images/demos/demo1/products/product6.jpg" alt="Blue Pinafore Denim Dress"
                                width="220" height="245" style="background-color: #f2f3f5;">
                        </a>
                        <div class="product-label-group">
                            <label class="product-label label-new">New</label>
                        </div>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Enquiry">Enquiry Now</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h3 class="product-name">
                            <a href="demo8-product.html">Original Outdoor Bin</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                        </div>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:100%"></span>
                                <span class="tooltiptext tooltip-top">5.00</span>
                            </div>
                            <a href="demo8-product.html" class="rating-reviews">( 6 reviews )</a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Enquiry Now">Enquiry Now</a>
                        </div>
                    </div>
                </div>
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="#">
                            <img src="/assets/images/demos/demo1/products/product7.jpg" alt="Blue Pinafore Denim Dress"
                                width="220" height="245" style="background-color: #f2f3f5;">
                        </a>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Enquiry">Enquiry Now</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h3 class="product-name">
                            <a href="demo8-product.html">Original Outdoor Bin</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                        </div>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:100%"></span>
                                <span class="tooltiptext tooltip-top">5.00</span>
                            </div>
                            <a href="demo8-product.html" class="rating-reviews">( 6 reviews )</a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Enquiry Now">Enquiry Now</a>
                        </div>
                    </div>
                </div>
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="#">
                            <img src="/assets/images/demos/demo1/products/product8.jpg" alt="Blue Pinafore Denim Dress"
                                width="220" height="245" style="background-color: #f2f3f5;">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-new">New</span>
                        </div>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Enquiry">Enquiry Now</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h3 class="product-name">
                            <a href="demo8-product.html">Original Outdoor Bin</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                        </div>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:100%"></span>
                                <span class="tooltiptext tooltip-top">5.00</span>
                            </div>
                            <a href="demo8-product.html" class="rating-reviews">( 6 reviews )</a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Enquiry Now">Enquiry Now</a>
                        </div>
                    </div>
                </div>
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="#">
                            <img src="/assets/images/demos/demo1/products/product9.jpg" alt="Blue Pinafore Denim Dress"
                                width="220" height="245" style="background-color: #f2f3f5;">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">27% Off</span>
                        </div>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Enquiry">Enquiry Now</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h3 class="product-name">
                            <a href="demo8-product.html">Original Outdoor Bin</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                        </div>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:100%"></span>
                                <span class="tooltiptext tooltip-top">5.00</span>
                            </div>
                            <a href="demo8-product.html" class="rating-reviews">( 6 reviews )</a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Enquiry Now">Enquiry Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="product-wrapper mt-6 mt-md-10 pt-4 mb-10 pb-2 container appear-animate"
            data-animation-options="{ 'delay': '.6s' }">
            <h2 class="title title-center">Rent Bike</h2>
            <div class="owl-carousel owl-theme row cols-2 cols-md-3 cols-lg-4 cols-xl-5" data-owl-options="{
                    'items': 5,
                    'nav': false,
                    'loop': false,
                    'dots': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '992': {
                            'items': 4
                        },
                        '1200': {
                            'items': 5,
                            'dots': false,
                            'nav': true
                        }
                    }
                }">
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="#">
                            <img src="/assets/images/demos/demo1/products/product5.jpg" alt="Blue Pinafore Denim Dress"
                                width="220" height="245" style="background-color: #f2f3f5;">
                        </a>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Enquiry">Enquiry Now</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="product-cat">
                            <a href="shop-grid-3cols.html">2BHK</a>
                        </div>
                        <h3 class="product-name">
                            <a href="#">Rama galaxy</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:40%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#" class="rating-reviews">( 15 reviews )</a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Enquiry Now">Enquiry Now</a>
                        </div>
                    </div>
                </div>
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="#">
                            <img src="/assets/images/demos/demo1/products/product6.jpg" alt="Blue Pinafore Denim Dress"
                                width="220" height="245" style="background-color: #f2f3f5;">
                        </a>
                        <div class="product-label-group">
                            <label class="product-label label-new">New</label>
                        </div>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Enquiry">Enquiry Now</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="product-cat">
                            <a href="shop-grid-3cols.html">2BHK</a>
                        </div>
                        <h3 class="product-name">
                            <a href="#">Joy lodge</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:40%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#" class="rating-reviews">( 15 reviews )</a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Enquiry Now">Enquiry Now</a>
                        </div>
                    </div>
                </div>
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="#">
                            <img src="/assets/images/demos/demo1/products/product7.jpg" alt="Blue Pinafore Denim Dress"
                                width="220" height="245" style="background-color: #f2f3f5;">
                        </a>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Enquiry">Enquiry Now</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="product-cat">
                            <a href="shop-grid-3cols.html">2BHK/3BHK/KOTHI</a>
                        </div>
                        <h3 class="product-name">
                            <a href="#">Sundaram Tower</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:40%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#" class="rating-reviews">( 15 reviews )</a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Enquiry Now">Enquiry Now</a>
                        </div>
                    </div>
                </div>
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="#">
                            <img src="/assets/images/demos/demo1/products/product8.jpg" alt="Blue Pinafore Denim Dress"
                                width="220" height="245" style="background-color: #f2f3f5;">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-new">New</span>
                        </div>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Enquiry">Enquiry Now</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="product-cat">
                            <a href="shop-grid-3cols.html">2BHK</a>
                        </div>
                        <h3 class="product-name">
                            <a href="#">Rama Homes</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:40%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#" class="rating-reviews">( 15 reviews )</a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Enquiry Now">Enquiry Now</a>
                        </div>
                    </div>
                </div>
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="#">
                            <img src="/assets/images/demos/demo1/products/product9.jpg" alt="Blue Pinafore Denim Dress"
                                width="220" height="245" style="background-color: #f2f3f5;">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">27% Off</span>
                        </div>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                    class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Enquiry">Enquiry Now</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="product-cat">
                            <a href="shop-grid-3cols.html">2BHK</a>
                        </div>
                        <h3 class="product-name">
                            <a href="#">Rama Apartment</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:40%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#" class="rating-reviews">( 15 reviews )</a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Enquiry Now">Enquiry Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

@endsection