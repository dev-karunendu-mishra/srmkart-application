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

    <link rel="icon" type="image/png" href="/assets/images/icons/favicon.png">

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

        @media (min-width: 768px) {
            .page-content .product.product-with-qty .product-details .btn-cart i {
                display: inline-block
            }
        }

        .page-content .product.product-with-qty .btn-product span {
            font-weight: 600
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

    <div class="sticky-footer sticky-content fix-bottom">
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

    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>

    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay">
        </div>

        <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>

        <div class="mobile-menu-container scrollable">
            <form action="#" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off"
                    placeholder="Search your keyword..." required="">
                <button class="btn btn-search" type="submit" title="submit-button">
                    <i class="d-icon-search"></i>
                </button>
            </form>

            <ul class="mobile-menu mmenu-anim">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="shop.html">Categories</a>
                    <ul>
                        <li>
                            <a href="#">
                                Variations 1
                            </a>
                            <ul>
                                <li><a href="shop-classic-filter.html">Classic Filter</a></li>
                                <li><a href="shop-left-toggle-sidebar.html">Left Toggle Filter</a></li>
                                <li><a href="shop-right-toggle-sidebar.html">Right Toggle Sidebar</a></li>
                                <li><a href="shop-horizontal-filter.html">Horizontal Filter </a>
                                </li>
                                <li><a href="shop-navigation-filter.html">Navigation Filter</a></li>
                                <li><a href="shop-off-canvas.html">Off-Canvas Filter </a></li>
                                <li><a href="shop-top-banner.html">Top Banner</a></li>
                                <li><a href="shop-inner-top-banner.html">Inner Top Banner</a></li>
                                <li><a href="shop-with-bottom-block.html">With Bottom Block</a></li>
                                <li><a href="shop-category-in-page-header.html">Category In Page Header</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                Variations 2
                            </a>
                            <ul>
                                <li><a href="shop-grid-3cols.html">3 Columns Mode</a></li>
                                <li><a href="shop-grid-4cols.html">4 Columns Mode</a></li>
                                <li><a href="shop-grid-5cols.html">5 Columns Mode</a></li>
                                <li><a href="shop-grid-6cols.html">6 Columns Mode</a></li>
                                <li><a href="shop-grid-7cols.html">7 Columns Mode</a></li>
                                <li><a href="shop-grid-8cols.html">8 Columns Mode</a></li>
                                <li><a href="shop-list-mode.html">List Mode</a></li>
                                <li><a href="shop-pagination.html">Pagination</a></li>
                                <li><a href="shop-infinite-ajaxscroll.html">Infinite Ajaxscroll </a></li>
                                <li><a href="shop-loadmore-button.html">Loadmore Button</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                Variations 3
                            </a>
                            <ul>
                                <li><a href="shop-category-grid-shop.html">Category Grid Shop</a></li>
                                <li><a href="shop-category%20products.html">Category + Products</a></li>
                                <li><a href="shop-default-1.html">Shop Default 1 </a>
                                </li>
                                <li><a href="shop-default-2.html">Shop Default 2</a></li>
                                <li><a href="shop-default-3.html">Shop Default 3</a></li>
                                <li><a href="shop-default-4.html">Shop Default 4</a></li>
                                <li><a href="shop-default-5.html">Shop Default 5</a></li>
                                <li><a href="shop-default-6.html">Shop Default 6</a></li>
                                <li><a href="shop-default-7.html">Shop Default 7</a></li>
                                <li><a href="shop-default-8.html">Shop Default 8</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="product.html">Products</a>
                    <ul>
                        <li>
                            <a href="#">Product Pages</a>
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
                        </li>
                        <li>
                            <a href="#">Product Layouts</a>
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
                        </li>
                        <li>
                            <a href="#">Product Features</a>
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
                                <li><a href="product-video.html">Video Thumbnail </a>
                                </li>
                                <li><a href="product-360-degree.html">360 Degree Thumbnail </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Pages</a>
                    <ul>
                        <li><a href="about-us.html">About</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                        <li><a href="account.html">Login</a></li>
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
                </li>
                <li>
                    <a href="element.html">Elements</a>
                    <ul>
                        <li>
                            <a href="#">Elements 1</a>
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
                        </li>
                        <li>
                            <a href="#">Elements 2</a>
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
                        </li>
                        <li>
                            <a href="#">Elements 3</a>
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
                        </li>
                        <li>
                            <a href="#">Elements 4</a>
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
                        </li>
                    </ul>
                </li>
                <li><a href="https://.com/buynow/riodehtml">Buy SRM Kart!</a></li>
            </ul>



        </div>
    </div>

    <div class="newsletter-popup newsletter-pop1 mfp-hide" id="newsletter-popup"
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
    </div>

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
