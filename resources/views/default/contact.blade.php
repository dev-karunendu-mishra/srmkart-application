@extends('default.layout')
@section('main')

@push('style')
<link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">
@endpush

    <main class="main">
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </nav>
        <div class="page-header" style="background-image: url(/assets/images/page-header/contact-us.jpg)">
            <h1 class="page-title font-weight-bold text-capitalize ls-l">Contact Us</h1>
        </div>
        <div class="page-content mt-10 pt-7">
            <section class="contact-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 ls-m mb-4">
                            <div class="grey-section d-flex align-items-center h-100">
                                <div>
                                    <h4 class="mb-2 text-capitalize">Headquarters</h4>
                                    <p>{{$siteData ? $siteData->address : "Address"}}</p>
                                    <h4 class="mb-2 text-capitalize">Phone Number</h4>
                                    <p>
                                        <a href="tel:#">{{$siteData ? $siteData->mobile : "Mobile No."}}</a>
                                    </p>
                                    <h4 class="mb-2 text-capitalize">Support</h4>
                                    <p class="mb-4">
                                        <a href="#"><span class="__cf_email__"
                                                data-cfemail="3744424747584543774e5842451a53585a565e591954585a">[email&#160;protected]</span></a><br>
                                        <a href="#"><span class="__cf_email__"
                                                data-cfemail="5038353c2010293f25227d343f3d31393e7e333f3d">[email&#160;protected]</span></a><br>
                                        <a href="#">Sale</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-6 d-flex align-items-center mb-4">
                            <div class="w-100">
                                <form class="pl-lg-2" action="#">
                                    <h4 class="ls-m font-weight-bold">Let’s Connect</h4>
                                    <p>Your email address will not be published. Required fields are
                                        marked *</p>
                                    <div class="row mb-2">
                                        <div class="col-12 mb-4">
                                            <textarea class="form-control" required=""
                                                placeholder="Comment*"></textarea>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input class="form-control" type="text" placeholder="Name *"
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input class="form-control" type="email" placeholder="Email *"
                                                required="">
                                        </div>
                                    </div>
                                    <button class="btn btn-dark btn-rounded">Post Comment<i
                                            class="d-icon-arrow-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="store-section mt-6 pt-10 pb-8">
                <div class="container">
                    <h2 class="title title-center mb-7 text-normal">Our store</h2>
                    <div class="row cols-sm-2 cols-lg-4">
                        <div class="store">
                            <figure class="banner-radius">
                                <img src="/assets/images/subpages/store-1.jpg" alt="store" width="280" height="280">
                                <h4 class="overlay-visible">New York</h4>
                                <div class="overlay overlay-transparent">
                                    <a class="mt-8" href="mail:#"><span class="__cf_email__"
                                            data-cfemail="d8b5b9b1b498b6bdafa1b7aab3aab1b7bcbdabacb7aabdf6bbb7b5">[email&#160;protected]</span></a>
                                    <a href="tel:#">Phone: (123) 456-7890</a>
                                    <div class="social-links mt-1">
                                        <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                        <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                        <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="store">
                            <figure class="banner-radius">
                                <img src="/assets/images/subpages/store-2.jpg" alt="store" width="280" height="280">
                                <h4 class="overlay-visible">London</h4>
                                <div class="overlay overlay-transparent">
                                    <a class="mt-8" href="mail:#"><span class="__cf_email__"
                                            data-cfemail="3954585055795556575d56574b50565d5c4a4d564b5c175a5654">[email&#160;protected]</span></a>
                                    <a href="tel:#">Phone: (123) 456-7890</a>
                                    <div class="social-links mt-1">
                                        <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                        <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                        <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="store">
                            <figure class="banner-radius">
                                <img src="/assets/images/subpages/store-3.jpg" alt="store" width="280" height="280">
                                <h4 class="overlay-visible">Oslo</h4>
                                <div class="overlay overlay-transparent">
                                    <a class="mt-8" href="mail:#"><span class="__cf_email__"
                                            data-cfemail="ff929e9693bf908c93908d96909b9a8c8b908d9ad19c9092">[email&#160;protected]</span></a>
                                    <a href="tel:#">Phone: (123) 456-7890</a>
                                    <div class="social-links mt-1">
                                        <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                        <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                        <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        <div class="store">
                            <figure class="banner-radius">
                                <img src="/assets/images/subpages/store-4.jpg" alt="store" width="280" height="280">
                                <h4 class="overlay-visible">Stockholm</h4>
                                <div class="overlay overlay-transparent">
                                    <a class="mt-8" href="mail:#"><span class="__cf_email__"
                                            data-cfemail="abc6cac2c7ebd8dfc4c8c0c3c4c7c6d9c2c4cfced8dfc4d9ce85c8c4c6">[email&#160;protected]</span></a>
                                    <a href="tel:#">Phone: (123) 456-7890</a>
                                    <div class="social-links mt-1">
                                        <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                        <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                        <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </section>


            <div class="grey-section google-map" id="googlemaps" style="height: 386px"></div>

        </div>
    </main>

    @push('scripts')
    <script src="/assets/vendor/jquery.gmap/jquery.gmap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key="></script>
    <script>

        /*
        Map Settings

            Find the Latitude and Longitude of your address:
                - https://www.latlong.net/
                - http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

        */

        // Map Markers
        var mapMarkers = [ {
            address: "New York, NY 10017",
            html: "<strong>New York Office<\/strong><br>New York, NY 10017",
            popup: true
        } ];

        // Map Initial Location
        var initLatitude = 40.75198;
        var initLongitude = -73.96978;

        // Map Extended Settings
        var mapSettings = {
            controls: {
                draggable: !window.Riode.isMobile,
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true
            },
            scrollwheel: false,
            markers: mapMarkers,
            latitude: initLatitude,
            longitude: initLongitude,
            zoom: 11
        };

        var map = $( '#googlemaps' ).gMap( mapSettings );

        // Map text-center At
        var mapCenterAt = function ( options, e ) {
            e.preventDefault();
            $( '#googlemaps' ).gMap( "centerAt", options );
        }

    </script>
    @endpush
@endsection