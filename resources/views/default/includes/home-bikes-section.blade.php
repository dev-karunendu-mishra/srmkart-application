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
        @forelse($bikes as $bike)
         <x-product-card :details="$bike" path="/bikes"/>
        @empty
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
        @endforelse
        
    </div>
</section>