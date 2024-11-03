<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>SRM Kart</title>
    <meta name="keywords" content="SRM Kart">
    <meta name="description" content="SRM Kart">
    <meta name="author" content="">
    <meta name="robots" content="noindex, nofollow" />
    
    <!-- CSRF Token in a meta tag -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="/assets/images/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/assets/images/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/assets/images/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="/assets/images/favicon/site.webmanifest" />

    <link rel="preload" href="/assets/fonts/srm.ttf?5gap68" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/animate/animate.min.css">

    <link rel="stylesheet" type="text/css" href="/assets/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/sticky-icon/stickyicon.css">

    @stack('style')

    <script>
        WebFontConfig = {
            google: { families: ['Poppins:300,400,500,600,700,800'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <style>
        .header-bottom .header-left {
            justify-content: center;
        }
        .btn-primary {
            background-color: #ec1c58;
            border-color: #ec1c58;
            color: #fff;
        }
        .btn-primary:active, .btn-primary:focus, .btn-primary:hover {
            color: #fff;
            border-color: #c11547;
            background-color: #c11547;
        }

        .btn-primary.btn-outline {
            color: #ec1c58;
            border-color: #ec1c58;
        }
        .btn-primary.btn-outline:active, .btn-primary.btn-outline:focus, .btn-primary.btn-outline:hover {
            background-color: #ec1c58;
        }

        .ratings:before {
            color: #ec1c58;
        }

        .product.cart-full .btn-cart, 
        .product-details .btn-cart, .product-hide-details .btn-cart,
        .product.product-with-qty .product-details .btn-cart {
            border-color: #ec1c58;
        }
        .btn-product, .product-form .btn-cart, .product-form .btn-external, .product.product-with-qty button:hover {
            background-color: #ec1c58;
        }
        .product-form .btn-cart:hover:not(:disabled), .product-form .btn-external:hover:not(:disabled) {
            background-color: #c11547;
        }

        .product.cart-full .btn-cart:active, .product.cart-full .btn-cart:focus, .product.cart-full .btn-cart:hover, .product.product-with-qty .product-details .btn-cart:active, .product.product-with-qty .product-details .btn-cart:focus, .product.product-with-qty .product-details .btn-cart:hover, .product:hover .product-action .btn-cart {
            background-color: #ec1c58;
            border-color: #ec1c58;
            color: #fff;
        }
        .product-action {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            background-color: transparent;
            z-index: 10;
            transition: opacity 0.3s, visibility 0.3s;
            opacity: 0
        }

        .page-content .product.product-with-qty .product-price {
            margin-bottom: 0.3rem
        }

        .page-content .product.product-with-qty .product-details {
            padding-left: 0.5rem;
            padding-right: 0.5rem
        }

        .page-content .product.product-with-qty .product-details .btn-cart {
            max-width: 14.2rem
        }

        .page-content .product.product-with-qty .product-details .btn-cart i {
            font-size: 16px
        }

        .page-content .product.product-with-qty .btn-product span {
            font-weight: 600
        }

        .banner-fixed, .banner-fixed figure, .banner-fixed figure img {
            height: 100%;
        }
        .feature-banner .banner-fixed figure {
            filter: brightness(0.5);
        }
        .product-navigation .breadcrumb {
            font-size: 1.85rem;
            font-weight: 600;
        }
        .product-label-group {
            flex-direction: row;
            justify-content: space-between;
            left: 0;
            right: 0;
            top: 1rem;
            max-width: unset;
            padding-inline: 1rem;
        }
        
        @media (min-width: 768px) {
            .product-wrapper .owl-carousel .owl-item img,
            .product-wrapper .food-card figure img,
            .product-wrapper .property-card  figure img {
                height: 240px;
            }
            .page-content .product.product-with-qty .product-details .btn-cart i {
                display: inline-block
            }
        }
        
        @media (max-width: 768px) {
            .header-middle .header-left .logo {
                margin-inline: auto;
            }
            .header-middle .header-left .logo img {
                width: 65px;
            }
            .product-wrapper .owl-carousel .owl-item img,
            .product-wrapper .food-card figure img,
            .product-wrapper .property-card  figure img {
                height: 160px;
            }
        }  
    </style>
</head>

<body class="{{!empty($pageClass[Route::currentRouteName()])?$pageClass[Route::currentRouteName()]:''}}">
    <div class="page-wrapper">
        @include('default.includes.header')
    
        @section('main')
        @show

        <!-- Footer Start -->
        @include('default.includes.footer')
        <!-- Footer End -->

    </div>

    <div class="d-none sticky-footer sticky-content fix-bottom">
        <a href="/" class="sticky-link">
            <i class="d-icon-home"></i>
            <span>Home</span>
        </a>
        <a href="shop.html" class="sticky-link">
            <i class="d-icon-volume"></i>
            <span>Categories</span>
        </a>
        <a href="wishlist.html" class="sticky-link">
            <i class="d-icon-heart"></i>
            <span>Wishlist</span>
        </a>
        <a href="account.html" class="sticky-link">
            <i class="d-icon-user"></i>
            <span>Account</span>
        </a>
        <div class="header-search hs-toggle dir-up">
            <a href="#" class="search-toggle sticky-link">
                <i class="d-icon-search"></i>
                <span>Search</span>
            </a>
            <form action="#" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off"
                    placeholder="Search your keyword..." required="">
                <button class="btn btn-search" type="submit" title="submit-button">
                    <i class="d-icon-search"></i>
                </button>
            </form>
        </div>
    </div>

    <a href="#" role="button" class="scroll-top show"><i class="fab fa-whatsapp text-white"></i></a>
    <!-- <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a> -->

    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay">
        </div>

        <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>

        <div class="mobile-menu-container scrollable">
            <!-- <form action="#" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off"
                    placeholder="Search your keyword..." required="">
                <button class="btn btn-search" type="submit" title="submit-button">
                    <i class="d-icon-search"></i>
                </button>
            </form> -->
            <a href="/" class="logo">
                @if($siteData)
                <img src="{{ asset($siteData->logo) }}" alt="logo" class="mx-auto bg-white" width="44px" height="44" />
                @else
                <h1 class="m-0 display-5 font-weight-semi-bold"><span
                        class="text-primary font-weight-bold border px-3 mr-1">SRMKART</h1>
                @endif
            </a>

            <ul class="mobile-menu mmenu-anim">
                <li class="{{Route::currentRouteName()=='home'?'active':''}}"> <a href="/">Home</a> </li>
                <li class="{{Route::currentRouteName()=='about'?'active':''}}"> <a href="/about-us">About Us</a>
                </li>
                <li class="{{Route::currentRouteName()=='foods'?'active':''}}"> <a href="/foods">Food</a> </li>
                <li class="{{Route::currentRouteName()=='property'?'active':''}}"> <a
                        href="/rent-for-property">Property for rent</a> </li>
                
                <li class="{{Route::currentRouteName()=='printout'?'active':''}}"> <a
                        href="/printout">Printout</a> </li>
                <li class="{{Route::currentRouteName()=='assignment'?'active':''}}"> <a
                        href="/assignment">Assignment</a> </li>
                        <li class="{{Route::currentRouteName()=='internship'?'active':''}}"> <a
                        href="/internship">Internship</a> </li>
                <li class="{{Route::currentRouteName()=='course'? 'active':''}}"> <a href="/course">Courses</a> </li>
                <li class="{{Route::currentRouteName()=='delivery_agent'? 'active':''}}"> 
                    <a href="{{route('delivery_agent.index')}}">Join as delivery boy</a>
                </li>   
                <li class="{{Route::currentRouteName()=='assignment_writer'? 'active':''}}"> 
                    <a href="{{route('assignment_writer.index')}}"> Assignment Writer</a> 
                </li>
                <li class="{{Route::currentRouteName()=='contact'?'active':''}}"> <a href="/contact-us">Custom/Essentials</a> </li>

            </ul>

        </div>
    </div>

    {{--<div class="newsletter-popup newsletter-pop1 mfp-hide" id="newsletter-popup"
        style="background-image: url(/assets/images/newsletter-popup.jpg)">
        <div class="newsletter-content">
            <h4 class="text-uppercase text-dark">Up to <span class="text-primary">20% Off</span></h4>
            <h2 class="font-weight-semi-bold">Sign up to <span>SRM KART</span></h2>
            <p class="text-grey">Subscribe to the SRM Kart eCommerce newsletter to receive timely updates from your
                favorite
                products.</p>
            <form action="#" method="get" class="input-wrapper input-wrapper-inline input-wrapper-round">
                <input type="email" class="form-control email" name="email" id="email2"
                    placeholder="Email address here..." required="">
                <button class="btn btn-dark" type="submit">SUBMIT</button>
            </form>
            <div class="form-checkbox justify-content-center">
                <input type="checkbox" class="custom-checkbox" id="hide-newsletter-popup" name="hide-newsletter-popup"
                    required="">
                <label for="hide-newsletter-popup">Don't show this popup again</label>
            </div>
        </div>
    </div>--}}

    <!-- <div class="sticky-icons-wrapper">
        <div class="sticky-icon-links">
            <ul>
                <li><a href="#" class="demo-toggle"><i class="fas fa-home"></i><span>Demos</span></a></li>
                <li><a href="documentation.html"><i class="fas fa-info-circle"></i><span>Documentation</span></a>
                </li>
                <li><a href="https://themeforest.net/downloads/"><i class="fas fa-star"></i><span>Reviews</span></a>
                </li>
                <li><a href="https://.com/buynow/riodehtml"><i class="fas fa-shopping-cart"></i><span>Buy
                            now!</span></a></li>
            </ul>
        </div>
        <div class="demos-list">
            <div class="demos-overlay"></div>
            <a class="demos-close" href="#"><i class="close-icon"></i></a>
            <div class="demos-content scrollable scrollable-light">
                <h3 class="demos-title">Demos</h3>
                <div class="demos">
                </div>
            </div>
        </div>
    </div> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/parallax/parallax.min.js"></script>
    <script src="/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="/assets/vendor/elevatezoom/jquery.elevatezoom.min.js"></script>
    <script src="/assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="/assets/vendor/owl-carousel/owl.carousel.min.js"></script>
    <script src="/assets/js/main.min.js"></script>
    <script src="/assets/js/cart.js"></script>
    @stack('scripts')

    <!-- <script>
  // Object containing sub-categories
  const subCategories = {
    hostel: ["Hostel 1", "Hostel 2", "Hostel 3", "Hostel 4"],
    estancia: ["Tower 1", "Tower 2", "Tower 3", "Tower 4"],
    abode: ["A Block", "B Block", "C Block", "D Block"]
  };

  // Function to update the sub-category dropdown
  function updateSubCategory() {
    const mainCategory = document.getElementById("main-category").value;
    const subCategorySelect = document.getElementById("sub-category");

    // Clear the current options in sub-category select
    subCategorySelect.innerHTML = '';

    // Add the new sub-category options
    subCategories[mainCategory].forEach(function(subCategory) {
      const option = document.createElement("option");
      option.value = subCategory.toLowerCase();
      option.text = subCategory;
      subCategorySelect.appendChild(option);
    });
  }

  // Initialize the sub-category dropdown when the page loads
  document.addEventListener("DOMContentLoaded", updateSubCategory);
</script> -->
</body>

</html>
