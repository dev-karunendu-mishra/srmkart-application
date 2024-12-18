<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <p class="welcome-msg">Welcome to SRM Kart</p>
            </div>
            <div class="header-right">
                <!-- <div class="dropdown">
                            <a href="#currency">USD</a>
                            <ul class="dropdown-box">
                                <li><a href="#USD">USD</a></li>
                                <li><a href="#EUR">EUR</a></li>
                            </ul>
                        </div>

                        <div class="dropdown ml-5">
                            <a href="#language">ENG</a>
                            <ul class="dropdown-box">
                                <li>
                                    <a href="#USD">ENG</a>
                                </li>
                                <li>
                                    <a href="#EUR">FRH</a>
                                </li>
                            </ul>
                        </div> -->

                <!-- <span class="divider"></span> -->
                <a href="{{route('delivery_agent.index')}}" class="contact text-primary d-lg-show"><i class="d-icon-food"></i>Partner as an Agent</a>
                <a href="{{route('assignment_writer.index')}}" class="help text-primary d-lg-show"><i class="d-icon-info"></i> Partner as an Assignment Writer</a>
                <!-- <a href="#" class="help d-lg-show"><i class="d-icon-info"></i> Need Help</a> -->
                @auth
                <a href="{{ url('/dashboard') }}" class="link-to-tab">
                    Dashboard
                </a>
                @else
                @if(Route::currentRouteName() != 'login' && Route::currentRouteName() != 'register')
                <a href="#signin" class="login-toggle link-to-tab d-md-show"><i class="d-icon-user"></i>Sign
                    in</a>
                <span class="delimiter">/</span>
                <a href="#register" class="register-toggle link-to-tab d-md-show ml-0">Register</a>
                @endif
                @endauth
                @if(Route::currentRouteName() != 'login' && Route::currentRouteName() != 'register')
                @include('default.includes.auth')
                @endif

            </div>
        </div>
    </div>

    <div class="header-middle sticky-header fix-top sticky-content">
        <div class="container">
            <div class="header-left">
                <a href="#" class="mobile-menu-toggle">
                    <i class="d-icon-bars2"></i>
                </a>
                <a href="/" class="logo">
                    @if($siteData)
                    <img src="{{ asset($siteData->logo) }}" alt="logo" width="100px" height="100px" />
                    @else
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">SRMKART</h1>
                    @endif
                </a>

                <div class="header-search hs-simple">
                    <form action="#" class="input-wrapper">
                        <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search..."
                            required="">
                        <button class="btn btn-search" type="submit" title="submit-button">
                            <i class="d-icon-search"></i>
                        </button>
                    </form>
                </div>

            </div>
            <div class="header-right">
                <a href="tel:{{$siteData ? $siteData->mobile : '#'}}" class="icon-box icon-box-side">
                    <div class="icon-box-icon mr-0 mr-lg-2">
                        <i class="d-icon-phone"></i>
                    </div>
                    <div class="icon-box-content d-lg-show">
                        <h4 class="icon-box-title">Call Us Now:</h4>
                        <p>{{$siteData ? $siteData->mobile : "Mobile No"}}</p>
                    </div>
                </a>

                <!-- Wishlist -->
                <!-- <span class="divider"></span>
                        <div class="dropdown wishlist wishlist-dropdown off-canvas">
                            <a href="/wishlist" class="wishlist-toggle">
                                <i class="d-icon-heart"></i>
                            </a>
                            <div class="canvas-overlay"></div>

                            <div class="dropdown-box scrollable">
                                <div class="canvas-header">
                                    <h4 class="canvas-title">wishlist</h4>
                                    <a href="#" class="btn btn-dark btn-link btn-icon-right btn-close">close<i
                                            class="d-icon-arrow-right"></i><span class="sr-only">wishlist</span></a>
                                </div>
                                <div class="products scrollable">
                                    <div class="product product-wishlist">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="/assets/images/wishlist/product-1.jpg" width="100" height="100"
                                                    alt="product">
                                            </a>
                                            <button class="btn btn-link btn-close">
                                                <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                            </button>
                                        </figure>
                                        <div class="product-detail">
                                            <a href="product.html" class="product-name">Girl's Dark Bag</a>
                                            <div class="price-box">
                                                <span class="product-price">₹84.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-wishlist">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="/assets/images/wishlist/product-2.jpg" width="100" height="100"
                                                    alt="product">
                                            </a>
                                            <button class="btn btn-link btn-close">
                                                <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                            </button>
                                        </figure>
                                        <div class="product-detail">
                                            <a href="product.html" class="product-name">Women's Fashional Comforter
                                            </a>
                                            <div class="price-box">
                                                <span class="product-price">₹84.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-wishlist">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="/assets/images/wishlist/product-3.jpg" width="100" height="100"
                                                    alt="product">
                                            </a>
                                            <button class="btn btn-link btn-close">
                                                <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                            </button>
                                        </figure>
                                        <div class="product-detail">
                                            <a href="product.html" class="product-name">Wide Knickerbockers</a>
                                            <div class="price-box">
                                                <span class="product-price">₹84.00</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <a href="wishlist.html" class="btn btn-dark wishlist-btn mt-4"><span>Go To
                                        Wishlist</span></a>

                            </div>

                        </div> -->

                <!-- Cart -->
                <span class="divider"></span>
                <div class="dropdown cart-dropdown type2 off-canvas mr-0 mr-lg-2">
                    <a href="/cart" class="cart-toggle label-block link">
                        <div class="cart-label d-lg-show">
                            <span class="cart-name">Shopping Cart:</span>
                            <span class="cart-price">₹<span
                                    style="display: inline;">{{Cart::subTotal()}}</span></span>
                        </div>
                        <i class="d-icon-bag"><span
                                class="cart-count">{{Cart::count()}}</span></i>
                    </a>
                    <!-- <div class="canvas-overlay"></div>

                            <div class="dropdown-box">
                                <div class="canvas-header">
                                    <h4 class="canvas-title">Shopping Cart</h4>
                                    <a href="#" class="btn btn-dark btn-link btn-icon-right btn-close">close<i
                                            class="d-icon-arrow-right"></i><span class="sr-only">Cart</span></a>
                                </div>
                                <div class="products scrollable">
                                    <div class="product product-cart">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="/assets/images/cart/product-1.jpg" alt="product" width="80"
                                                    height="88">
                                            </a>
                                            <button class="btn btn-link btn-close">
                                                <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                            </button>
                                        </figure>
                                        <div class="product-detail">
                                            <a href="product.html" class="product-name">SRM Kart White Trends</a>
                                            <div class="price-box">
                                                <span class="product-quantity">1</span>
                                                <span class="product-price">₹21.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-cart">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="/assets/images/cart/product-2.jpg" alt="product" width="80"
                                                    height="88">
                                            </a>
                                            <button class="btn btn-link btn-close">
                                                <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                            </button>
                                        </figure>
                                        <div class="product-detail">
                                            <a href="product.html" class="product-name">Dark Blue Women’s
                                                Leomora Hat</a>
                                            <div class="price-box">
                                                <span class="product-quantity">1</span>
                                                <span class="product-price">₹118.00</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price">₹139.00</span>
                                </div>

                                <div class="cart-action">
                                    <a href="/cart" class="btn btn-dark btn-link">View Cart</a>
                                    <a href="/checkout" class="btn btn-dark"><span>Go To Checkout</span></a>
                                </div>
                            </div> -->

                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom d-lg-show">
        <div class="container">
            <div class="header-left">
                <nav class="main-nav">
                    <ul class="menu">
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
                        <li class="{{Route::currentRouteName()=='course'?'active':''}}"> <a href="/course">Courses</a> </li>
                        <li class="{{Route::currentRouteName()=='contact'?'active':''}}"> <a href="/contact-us">Custom/Essentials</a> </li>
                        <!-- <li>
                                    <a href="shop.html">Categories</a>
                                    <div class="megamenu">
                                        <div class="row">
                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <h4 class="menu-title">Variations 1</h4>
                                                <ul>
                                                    <li><a href="shop-classic-filter.html">Classic Filter</a></li>
                                                    <li><a href="shop-left-toggle-sidebar.html">Left Toggle Filter</a>
                                                    </li>
                                                    <li><a href="shop-right-toggle-sidebar.html">Right Toggle
                                                            Sidebar</a></li>
                                                    <li><a href="shop-horizontal-filter.html">Horizontal Filter </a>
                                                    </li>
                                                    <li><a href="shop-navigation-filter.html">Navigation Filter</a></li>
                                                    <li><a href="shop-off-canvas.html">Off-Canvas Filter </a></li>
                                                    <li><a href="shop-top-banner.html">Top Banner</a></li>
                                                    <li><a href="shop-inner-top-banner.html">Inner Top Banner</a></li>
                                                    <li><a href="shop-with-bottom-block.html">With Bottom Block</a></li>
                                                    <li><a href="shop-category-in-page-header.html">Category In Page
                                                            Header</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <h4 class="menu-title">Variations 2</h4>
                                                <ul>
                                                    <li><a href="shop-grid-3cols.html">3 Columns Mode</a></li>
                                                    <li><a href="shop-grid-4cols.html">4 Columns Mode</a></li>
                                                    <li><a href="shop-grid-5cols.html">5 Columns Mode</a></li>
                                                    <li><a href="shop-grid-6cols.html">6 Columns Mode</a></li>
                                                    <li><a href="shop-grid-7cols.html">7 Columns Mode</a></li>
                                                    <li><a href="shop-grid-8cols.html">8 Columns Mode</a></li>
                                                    <li><a href="shop-list-mode.html">List Mode</a></li>
                                                    <li><a href="shop-pagination.html">Pagination</a></li>
                                                    <li><a href="shop-infinite-ajaxscroll.html">Infinite Ajaxscroll </a>
                                                    </li>
                                                    <li><a href="shop-loadmore-button.html">Loadmore Button</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <h4 class="menu-title">Variations 3</h4>
                                                <ul>
                                                    <li><a href="shop-category-grid-shop.html">Category Grid Shop</a>
                                                    </li>
                                                    <li><a href="shop-category%20products.html">Category + Products</a>
                                                    </li>
                                                    <li><a href="shop-default-1.html">Shop Default 1 </a></li>
                                                    <li><a href="shop-default-2.html">Shop Default 2</a>
                                                    </li>
                                                    <li><a href="shop-default-3.html">Shop Default 3</a>
                                                    </li>
                                                    <li><a href="shop-default-4.html">Shop Default 4</a>
                                                    </li>
                                                    <li><a href="shop-default-5.html">Shop Default 5</a>
                                                    </li>
                                                    <li><a href="shop-default-6.html">Shop Default 6</a>
                                                    </li>
                                                    <li><a href="shop-default-7.html">Shop Default 7</a>
                                                    </li>
                                                    <li><a href="shop-default-8.html">Shop Default 8</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div
                                                class="col-6 col-sm-4 col-md-4 col-lg-3 menu-banner menu-banner1 banner banner-fixed">
                                                <figure>
                                                    <img src="/assets/images/menu/banner-1.jpg" alt="Menu banner" width="221"
                                                        height="330">
                                                </figure>
                                                <div class="banner-content y-50">
                                                    <h4 class="banner-subtitle font-weight-bold text-primary ls-m">Sale.
                                                    </h4>
                                                    <h3 class="banner-title font-weight-bold"><span
                                                            class="text-uppercase">Up to</span>70% Off</h3>
                                                    <a href="shop.html" class="btn btn-link btn-underline">shop now<i
                                                            class="d-icon-arrow-right"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="product.html">Products</a>
                                    <div class="megamenu">
                                        <div class="row">
                                            <div class="col-6 col-sm-4 col-md-3">
                                                <h4 class="menu-title">Product Pages</h4>
                                                <ul>
                                                    <li><a href="product-simple.html">Simple Product</a></li>
                                                    <li><a href="product-featured.html">Featured &amp; On Sale</a></li>
                                                    <li><a href="product.html">Variable Product</a></li>
                                                    <li><a href="product-variable-swatch.html">Variation Swatch
                                                            Product</a></li>
                                                    <li><a href="product-grouped.html">Grouped Product </a></li>
                                                    <li><a href="product-external.html">External Product</a></li>
                                                    <li><a href="product-in-stock.html">In Stock Product</a></li>
                                                    <li><a href="product-out-stock.html">Out of Stock Product</a></li>
                                                    <li><a href="product-upsell.html">Upsell Products</a></li>
                                                    <li><a href="product-cross-sell.html">Cross Sell Products</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-3">
                                                <h4 class="menu-title">Product Layouts</h4>
                                                <ul>
                                                    <li><a href="product-vertical.html">Vertical Thumb</a></li>
                                                    <li><a href="product-horizontal.html">Horizontal Thumb</a></li>
                                                    <li><a href="product-gallery.html">Gallery Type</a></li>
                                                    <li><a href="product-grid.html">Grid Images</a></li>
                                                    <li><a href="product-masonry.html">Masonry Images</a></li>
                                                    <li><a href="product-sticky.html">Sticky Info</a></li>
                                                    <li><a href="product-sticky-both.html">Left & Right Sticky</a></li>
                                                    <li><a href="product-left-sidebar.html">With Left Sidebar</a></li>
                                                    <li><a href="product-right-sidebar.html">With Right Sidebar</a></li>
                                                    <li><a href="product-full.html">Full Width Layout </a></li>
                                                </ul>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-3">
                                                <h4 class="menu-title">Product Features</h4>
                                                <ul>
                                                    <li><a href="product-sale.html">Sale Countdown</a></li>
                                                    <li><a href="product-hurryup.html">Hurry Up Notification </a></li>
                                                    <li><a href="product-attribute-guide.html">Attribute Guide </a></li>
                                                    <li><a href="product-sticky-cart.html">Add Cart Sticky</a></li>
                                                    <li><a href="product-thumbnail-label.html">Labels on Thumbnail</a>
                                                    </li>
                                                    <li><a href="product-more-description.html">More Description
                                                            Tabs</a></li>
                                                    <li><a href="product-accordion-data.html">Data In Accordion</a></li>
                                                    <li><a href="product-tabinside.html">Data Inside</a></li>
                                                    <li><a href="product-video.html">Video Thumbnail </a></li>
                                                    <li><a href="product-360-degree.html">360 Degree Thumbnail </a></li>
                                                </ul>
                                            </div>
                                            <div
                                                class="col-6 col-sm-4 col-md-3 menu-banner menu-banner2 banner banner-fixed">
                                                <figure>
                                                    <img src="/assets/images/menu/banner-2.jpg" alt="Menu banner" width="221"
                                                        height="330">
                                                </figure>
                                                <div class="banner-content x-50 text-center">
                                                    <h3 class="banner-title text-white text-uppercase">Sunglasses</h3>
                                                    <h4 class="banner-subtitle font-weight-bold text-white mb-0">₹23.00
                                                        -
                                                        ₹120.00</h4>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">Pages</a>
                                    <ul>
                                        <li><a href="about-us.html">About</a></li>
                                        <li><a href="contact-us.html">Contact Us</a></li>
                                        <li><a href="account.html">My Account</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="faq.html">FAQs</a></li>
                                        <li><a href="error-404.html">Error 404</a>
                                            <ul>
                                                <li><a href="error-404.html">Error 404-1</a></li>
                                                <li><a href="error-404-1.html">Error 404-2</a></li>
                                                <li><a href="error-404-2.html">Error 404-3</a></li>
                                                <li><a href="error-404-3.html">Error 404-4</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="coming-soon.html">Coming Soon</a></li>
                                    </ul>
                                </li>
                                <li class="d-xl-show">
                                    <a href="element.html">Elements</a>
                                    <div class="megamenu">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h4 class="menu-title">Elements 1</h4>
                                                <ul>
                                                    <li><a href="element-accordions.html">Accordions</a></li>
                                                    <li><a href="element-alerts.html">Alert &amp; Notification</a></li>
                                                    <li><a href="element-banner-effect.html">Banner Effect
                                                        </a></li>
                                                    <li><a href="element-banner.html">Banner
                                                        </a></li>
                                                    <li><a href="element-blog-posts.html">Blog Posts</a></li>
                                                    <li><a href="element-breadcrumb.html">Breadcrumb
                                                        </a></li>
                                                    <li><a href="element-buttons.html">Buttons</a></li>
                                                    <li><a href="element-cta.html">Call to Action</a></li>
                                                    <li><a href="element-countdown.html">Countdown
                                                        </a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3">
                                                <h4 class="menu-title">Elements 2</h4>
                                                <ul>
                                                    <li><a href="element-counter.html">Counter </a></li>
                                                    <li><a href="element-creative-grid.html">Creative Grid
                                                        </a></li>
                                                    <li><a href="element-animation.html">Entrance Effect
                                                        </a></li>
                                                    <li><a href="element-floating.html">Floating
                                                        </a></li>
                                                    <li><a href="element-hotspot.html">Hotspot
                                                        </a></li>
                                                    <li><a href="element-icon-boxes.html">Icon Boxes</a></li>
                                                    <li><a href="element-icons.html">Icons</a></li>
                                                    <li><a href="element-image-box.html">Image box
                                                        </a></li>
                                                    <li><a href="element-instagrams.html">Instagrams</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3">
                                                <h4 class="menu-title">Elements 3</h4>
                                                <ul>
                                                    <li><a href="element-categories.html">Product Category</a></li>
                                                    <li><a href="element-products.html">Products</a></li>
                                                    <li><a href="element-product-banner.html">Products + Banner
                                                        </a></li>
                                                    <li><a href="element-product-grid.html">Products + Grid
                                                        </a></li>
                                                    <li><a href="element-product-single.html">Product Single
                                                        </a>
                                                    </li>
                                                    <li><a href="element-product-tab.html">Products + Tab
                                                        </a></li>
                                                    <li><a href="element-single-product.html">Single Product
                                                        </a></li>
                                                    <li><a href="element-slider.html">Slider
                                                        </a></li>
                                                    <li><a href="element-social-link.html">Social Icons </a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3">
                                                <h4 class="menu-title">Elements 4</h4>
                                                <ul>
                                                    <li><a href="element-subcategory.html">Subcategory
                                                        </a></li>
                                                    <li><a href="element-svg-floating.html">Svg Floating
                                                        </a></li>
                                                    <li><a href="element-tabs.html">Tabs</a></li>
                                                    <li><a href="element-testimonials.html">Testimonials
                                                        </a></li>
                                                    <li><a href="element-titles.html">Title</a></li>
                                                    <li><a href="element-typography.html">Typography</a></li>
                                                    <li><a href="element-vendor.html">Vendor
                                                        </a></li>
                                                    <li><a href="element-video.html">Video
                                                        </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="blog-classic.html">Blog</a>
                                    <ul>
                                        <li><a href="blog-classic.html">Classic</a></li>
                                        <li><a href="blog-listing.html">Listing</a></li>
                                        <li>
                                            <a href="#">Grid</a>
                                            <ul>
                                                <li><a href="blog-grid-2col.html">Grid 2 columns</a></li>
                                                <li><a href="blog-grid-3col.html">Grid 3 columns</a></li>
                                                <li><a href="blog-grid-4col.html">Grid 4 columns</a></li>
                                                <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Masonry</a>
                                            <ul>
                                                <li><a href="blog-masonry-2col.html">Masonry 2 columns</a></li>
                                                <li><a href="blog-masonry-3col.html">Masonry 3 columns</a></li>
                                                <li><a href="blog-masonry-4col.html">Masonry 4 columns</a></li>
                                                <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Mask</a>
                                            <ul>
                                                <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                                <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="post-single.html">Single Post</a>
                                        </li>
                                    </ul>
                                </li> -->
                        
                    </ul>
                </nav>
            </div>
            <!-- <div class="header-right">
                        <a href="#"><i class="d-icon-card"></i>Special Offers</a>
                        <a href="https://d-themes.com/buynow/riodehtml" class="ml-6">Buy !</a>
                    </div> -->
        </div>
    </div>
</header>