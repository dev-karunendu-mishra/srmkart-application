@extends('default.layout')
@section('main')
@push('style')
<link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">
@endpush
<main class="main">
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/"><i class="d-icon-home"></i></a></li>
                <li>Properties</li>
            </ul>
        </div>
    </nav>
    <div class="page-header pl-4 pr-4" style="background-image: url(/assets/images/page-header/about-us.jpg)">
        <h3 class="page-subtitle font-weight-bold">Cotegory</h3>
        <h1 class="page-title font-weight-bold lh-1 text-white text-capitalize">Properties</h1>
        <p class="page-desc text-white mb-0">Lorem quis bibendum auctor, nisi elit consequat ipsum,<br> nec
            sagittis sem nibh id elit.</p>
    </div>

    <div class="page-content mb-10 pb-6">
        <div class="container">
            <div class="row main-content-wrap gutter-lg">
                <div class="main-content">
                    <nav class="toolbox sticky-toolbox sticky-content fix-top">
                        <div class="toolbox-left">
                            <!-- <a href="#"
                                    class="toolbox-item left-sidebar-toggle btn btn-outline btn-primary btn-rounded btn-icon-right">Filter<i
                                        class="d-icon-arrow-right"></i></a> -->
                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                <label>Locations :</label>
                                <select id="location" name="location" class="form-control">
                                    <option value="All" selected>All</option>
                                    <option value="Estancia">Estancia</option>
                                    <option value="Abode">Abode</option>
                                </select>
                            </div>
                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                <label>Flat Type :</label>
                                <select id="flat_type" name="flat_type" class="form-control">
                                    <option value="All" selected disabled>All</option>
                                </select>
                            </div>
                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                <label>Vacancy :</label>
                                <select id="vacancy" name="vacancy" class="form-control">
                                    <option value="All" selected disabled>All</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </div>
                        <div class="toolbox-right">
                            <!-- <div class="toolbox-item toolbox-show select-box text-dark">
                                    <label>Show :</label>
                                    <select name="count" class="form-control">
                                        <option value="12">12</option>
                                        <option value="24">24</option>
                                        <option value="36">36</option>
                                    </select>
                                </div> -->
                            <div class="toolbox-item toolbox-layout">
                                <a href="shop-list-mode" class="d-icon-mode-list btn-layout"></a>
                                <a href="shop" class="d-icon-mode-grid btn-layout active"></a>
                            </div>
                        </div>
                    </nav>

                    <div class="row cols-2 cols-md-3 cols-lg-4 product-wrapper">
                        @forelse($records as $record)
                        <div class="col-xs-6 col-lg-3 mb-4">
                            <x-product-card :details="$record" path="/properties"
                                view="default.components.property-card" />
                        </div>
                        @empty
                        <div class="col-xs-6 col-lg-3 mb-4">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="/assets/images/demos/demo1/products/product5.jpg"
                                            alt="Blue Pinafore Denim Dress" width="220" height="245"
                                            style="background-color: #f2f3f5;">
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
                        </div>
                        <div class="col-xs-6 col-lg-3 mb-4">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="/assets/images/demos/demo1/products/product5.jpg"
                                            alt="Blue Pinafore Denim Dress" width="220" height="245"
                                            style="background-color: #f2f3f5;">
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
                        </div>
                        <div class="col-xs-6 col-lg-3 mb-4">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="/assets/images/demos/demo1/products/product5.jpg"
                                            alt="Blue Pinafore Denim Dress" width="220" height="245"
                                            style="background-color: #f2f3f5;">
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
                        </div>
                        <div class="col-xs-6 col-lg-3 mb-4">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="/assets/images/demos/demo1/products/product5.jpg"
                                            alt="Blue Pinafore Denim Dress" width="220" height="245"
                                            style="background-color: #f2f3f5;">
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
                        </div>
                        @endforelse
                    </div>

                    <!-- <nav class="toolbox toolbox-pagination">
                            <p class="show-info">Showing <span>12 of 56</span> Products</p>
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                        aria-disabled="true">
                                        <i class="d-icon-arrow-left"></i>Prev
                                    </a>
                                </li>
                                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item page-item-dots"><a class="page-link" href="#">6</a></li>
                                <li class="page-item">
                                    <a class="page-link page-link-next" href="#" aria-label="Next">
                                        Next<i class="d-icon-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav> -->
                </div>
                <aside class="col-lg-3 sidebar shop-sidebar">
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                    <div class="sidebar-content">
                        <div class="filter-actions mb-4">
                            <a href="#" class="sidebar-toggle-btn toggle-remain btn btn-sm btn-outline 
                                        btn-primary btn-rounded btn-icon-right">Filter<i
                                    class="d-icon-arrow-left"></i></a>
                            <a href="#" class="filter-clean text-primary">Clean All</a>
                        </div>
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">Product Categories</h3>
                            <ul class="widget-body filter-items search-ul">
                                <li>
                                    <a href="#">Clothing<span class="count">(6)</span></a>
                                    <ul>
                                        <li><a href="#">Summer sale<span class="count">(2)</span></a></li>
                                        <li><a href="#">Shirts<span class="count">(3)</span></a></li>
                                        <li><a href="#">Trunks<span class="count">(1)</span></a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Shoes<span class="count">(5)</span></a></li>
                                <li><a href="#">Men<span class="count">(8)</span></a></li>
                                <li><a href="#">Women<span class="count">(3)</span></a></li>
                                <li><a href="#">Bags & Backpacks<span class="count">(5)</span></a></li>
                                <li>
                                    <a href="#">Watches<span class="count">(4)</span></a>
                                    <ul>
                                        <li><a href="#">Men's<span class="count">(2)</span></a></li>
                                        <li><a href="#">Woment's<span class="count">(2)</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Accessosries<span class="count">(1)</span></a>
                                    <ul>
                                        <li><a href="#">Ring<span class="count">(1)</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">Filter by Price</h3>
                            <div class="widget-body">
                                <form action="#">
                                    <div class="filter-price-slider"></div>
                                    <div class="filter-actions">
                                        <div class="filter-price-text mb-4">Price:
                                            <span class="filter-price-range"></span>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-sm btn-dark btn-filter btn-rounded">Filter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">Size</h3>
                            <ul class="widget-body filter-items">
                                <li><a href="#">Extra Large<span class="count">(2)</span></a></li>
                                <li><a href="#">Large<span class="count">(5)</span></a></li>
                                <li><a href="#">Medium<span class="count">(8)</span></a></li>
                                <li><a href="#">Small<span class="count">(1)</span></a></li>
                            </ul>
                        </div>
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">Color</h3>
                            <ul class="widget-body filter-items">
                                <li><a href="#">Black<span class="count">(2)</span></a></li>
                                <li><a href="#">Blue<span class="count">(5)</span></a></li>
                                <li><a href="#">Green<span class="count">(8)</span></a></li>
                                <li><a href="#">White<span class="count">(1)</span></a></li>
                            </ul>
                        </div>
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">Brands</h3>
                            <ul class="widget-body filter-items">
                                <li><a href="#">SLS<span>(2)</span></a></li>
                                <li><a href="#">Cinderella<span>(5)</span></a></li>
                                <li><a href="#">Comedy<span>(8)</span></a></li>
                                <li><a href="#">Rightcheck<span>(1)</span></a></li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</main>
@endsection
@push('scripts')
<script>
    var loc = "All";
    var flatType = "All";
    var vacancy = 'All';
    $('#location').change((e) => {
        loc = e.target.value;
        const locations = { "Estancia": "Estancia", "Abode": "Abode" }
        const selectedLocation = locations[loc];
        const flatTypes = { Estancia: ["3 BHK 3 Washroom", "3 BHK 2 Washroom", "2.75 BHK 2 Washroom"], Abode: ["3 BHK 3 Washroom", "3 BHK 2 Washroom", "2.75 BHK 2 Washroom", "2.5 BHK 2 Washroom"] };
        if (selectedLocation) {
            let hostelOptions = "<option value='All' selected>All flat types</option>";
            flatTypes[selectedLocation].forEach((fType) => {
                hostelOptions += `<option value='${fType}'>${fType}</option>`;
            })
            $("#flat_type").html(hostelOptions);
        }

        if (loc !== "All") {
            $('.property-card').parent().addClass('d-none');
            filteredCards = $('.property-card').filter(function () {
                return $(this).data('location') === selectedLocation;
            });
            filteredCards.parent().removeClass('d-none');
        } else {
            $('.property-card').parent().removeClass('d-none');
        }

    })

    $('#flat_type').change((e) => {
        flatType = e.target.value;

        if (flatType !== "All") {
            $('.property-card').parent().addClass('d-none');
            filteredCards = $('.property-card').filter(function () {
                return $(this).data('location') === loc && $(this).data('flat-type') === flatType;
            });
            filteredCards.parent().removeClass('d-none');
        } else {
            $('.property-card').parent().addClass('d-none');
            filteredCards = $('.property-card').filter(function () {
                return $(this).data('location') === loc;
            });
            filteredCards.parent().removeClass('d-none');
        }

    })

    $('#vacancy').change((e) => {
        vacancy = e.target.value;

        if (vacancy !== "All") {
            $('.property-card').parent().addClass('d-none');

            filteredCards = $('.property-card').filter(function () {
                return parseInt($(this).data('vacancy')) === parseInt(vacancy);
            });
            filteredCards.parent().removeClass('d-none');
        } else {
            $('.property-card').parent().addClass('d-none');
            // filteredCards = $('.property-card').filter(function () {
            //     return $(this).data('location') === loc && $(this).data('flat-type') === flatType;
            // });
            filteredCards.parent().removeClass('d-none');
        }

    })

</script>
@endpush