<!-- Food Section -->
<section class="product-wrapper container appear-animate mt-6 mt-md-10 pt-4 pb-8" data-animation-options="{
                'delay': '.3s'
            }">
    <h2 class="title title-center mb-5">Best Food</h2>
    <div class="owl-carousel owl-theme row owl-nav-full cols-2 cols-md-3 cols-lg-4" data-owl-options="{
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
                            'items': 4,
                            'dots': false,
                            'nav': true
                        }
                    }
                }">

        @forelse ($foods as $food)
        <div class="product text-center product-with-qty">
            <figure class="product-media">
                <a href="product.html">
                    <img src="{{ asset($food->images[0]->path) }}" alt="Blue Pinafore Denim Dress"
                        width="280" height="315" style="background-color: #f2f3f5;">
                </a>
                <div class="product-label-group">
                    <span class="product-label label-sale">25% off</span>
                </div>
                <div class="product-action-vertical">
                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal"
                        title="Add to cart"><i class="d-icon-bag"></i></a>
                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                            class="d-icon-heart"></i></a>
                </div>
                <div class="product-action">
                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                </div>
            </figure>
            <div class="product-details">
                <h3 class="product-name">
                    <a href="">{{$food->name}}</a>
                </h3>
                <div class="product-price">
                    <ins class="new-price">{{$food->price}}</ins>@isset($food->old_price)<del
                        class="old-price">{{$food->old_price}}</del>@endisset
                </div>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 100%"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="demo-food3-product.html" class="rating-reviews">( 12 reviews )</a>
                </div>
                <div class="product-action">
                    <div class="product-quantity">
                        <button title="calculate" class="quantity-minus d-icon-minus"></button>
                        <input title="input" class="quantity form-control" type="number" min="1" max="1000000">
                        <button title="calculate" class="quantity-plus d-icon-plus"></button>
                    </div>
                    <a href="#" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal"
                        title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
                </div>
            </div>
        </div>
        @empty
        <div class="product text-center product-with-qty">
            <figure class="product-media">
                <a href="product.html">
                    <img src="/assets/images/demos/demo-food3/product/2-280x220.jpg" alt="Blue Pinafore Denim Dress"
                        width="280" height="315" style="background-color: #f2f3f5;">
                </a>
                <div class="product-label-group">
                    <span class="product-label label-sale">25% off</span>
                </div>
                <div class="product-action-vertical">
                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal"
                        title="Add to cart"><i class="d-icon-bag"></i></a>
                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                            class="d-icon-heart"></i></a>
                </div>
                <div class="product-action">
                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                </div>
            </figure>
            <div class="product-details">
                <h3 class="product-name">
                    <a href="demo-food3-product.html">Crown Daisy</a>
                </h3>
                <div class="product-price">
                    <ins class="new-price">$39</ins><del class="old-price">$95</del>
                </div>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 100%"></span>
                        <span class="tooltiptext tooltip-top">5.00</span>
                    </div>
                    <a href="demo-food3-product.html" class="rating-reviews">( 12 reviews )</a>
                </div>
                <div class="product-action">
                    <div class="product-quantity">
                        <button title="calculate" class="quantity-minus d-icon-minus"></button>
                        <input title="input" class="quantity form-control" type="number" min="1" max="1000000">
                        <button title="calculate" class="quantity-plus d-icon-plus"></button>
                    </div>
                    <a href="#" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal"
                        title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
                </div>
            </div>
        </div>
        <div class="product text-center product-with-qty">
            <figure class="product-media">
                <a href="product.html">
                    <img src="/assets/images/demos/demo-food3/product/3-280x220.jpg" alt="Blue Pinafore Denim Dress"
                        width="280" height="315" style="background-color: #f2f3f5;">
                </a>
                <div class="product-action-vertical">
                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal"
                        title="Add to cart"><i class="d-icon-bag"></i></a>
                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                            class="d-icon-heart"></i></a>
                </div>
                <div class="product-action">
                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                </div>
            </figure>
            <div class="product-details">
                <h3 class="product-name">
                    <a href="demo-food3-product.html">Slice Meat</a>
                </h3>
                <div class="product-price">
                    <ins class="new-price">$39</ins><del class="old-price">$95</del>
                </div>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 100%"></span>
                        <span class="tooltiptext tooltip-top">5.00</span>
                    </div>
                    <a href="demo-food3-product.html" class="rating-reviews">( 12 reviews )</a>
                </div>
                <div class="product-action">
                    <div class="product-quantity">
                        <button title="calculate" class="quantity-minus d-icon-minus"></button>
                        <input title="input" class="quantity form-control" type="number" min="1" max="1000000">
                        <button title="calculate" class="quantity-plus d-icon-plus"></button>
                    </div>
                    <a href="#" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal"
                        title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
                </div>
            </div>
        </div>
        <div class="product text-center product-with-qty">
            <figure class="product-media">
                <a href="product.html">
                    <img src="/assets/images/demos/demo-food3/product/4-280x220.jpg" alt="Blue Pinafore Denim Dress"
                        width="280" height="315" style="background-color: #f2f3f5;">
                </a>
                <div class="product-label-group">
                    <label class="product-label label-new">New</label>
                </div>
                <div class="product-action-vertical">
                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal"
                        title="Add to cart"><i class="d-icon-bag"></i></a>
                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                            class="d-icon-heart"></i></a>
                </div>
                <div class="product-action">
                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                </div>
            </figure>
            <div class="product-details">
                <h3 class="product-name">
                    <a href="demo-food3-product.html">Potato Crisp</a>
                </h3>
                <div class="product-price">
                    <ins class="new-price">$39</ins><del class="old-price">$95</del>
                </div>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 100%"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="demo-food3-product.html" class="rating-reviews">( 12 reviews )</a>
                </div>
                <div class="product-action">
                    <div class="product-quantity">
                        <button title="calculate" class="quantity-minus d-icon-minus"></button>
                        <input title="input" class="quantity form-control" type="number" min="1" max="1000000">
                        <button title="calculate" class="quantity-plus d-icon-plus"></button>
                    </div>
                    <a href="#" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal"
                        title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
                </div>
            </div>
        </div>
        <div class="product text-center product-with-qty">
            <figure class="product-media">
                <a href="product.html">
                    <img src="/assets/images/demos/demo-food3/product/4-280x220.jpg" alt="Blue Pinafore Denim Dress"
                        width="280" height="315" style="background-color: #f2f3f5;">
                </a>
                <div class="product-label-group">
                    <span class="product-label label-sale">25% off</span>
                </div>
                <div class="product-action-vertical">
                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal"
                        title="Add to cart"><i class="d-icon-bag"></i></a>
                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                            class="d-icon-heart"></i></a>
                </div>
                <div class="product-action">
                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                </div>
            </figure>
            <div class="product-details">
                <h3 class="product-name">
                    <a href="demo-food3-product.html">Potato Crisp</a>
                </h3>
                <div class="product-price">
                    <ins class="new-price">$39</ins><del class="old-price">$95</del>
                </div>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 100%"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="demo-food3-product.html" class="rating-reviews">( 12 reviews )</a>
                </div>
                <div class="product-action">
                    <div class="product-quantity">
                        <button title="calculate" class="quantity-minus d-icon-minus"></button>
                        <input title="input" class="quantity form-control" type="number" min="1" max="1000000">
                        <button title="calculate" class="quantity-plus d-icon-plus"></button>
                    </div>
                    <a href="#" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal"
                        title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</section>