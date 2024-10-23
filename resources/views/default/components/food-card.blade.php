@if(!empty($details))
<div class="product text-center product-with-qty">
    <figure class="product-media">
        <a href="/foods/{{$details->uuid}}">
            @if(!empty($details->images) && count($details->images) > 0)
            <img src="{{ asset($details->images->first()->path) }}" alt="{{$details->name}}" width="280" height="315"
                style="background-color: #f2f3f5;">
            @else
            <img src="https://via.placeholder.com/280x315" alt="card image" width="280" height="315"
                style="background-color: #f2f3f5;">
            @endif
        </a>
        @isset($details->is_new)
        <div class="product-label-group">
            <label class="product-label label-new">new</label>
        </div>
        @endisset
        <!-- <div class="product-action-vertical">
            <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal"
                title="Add to cart"><i class="d-icon-bag"></i></a>
            <a href="#" class="btn-product-icon btn-wishlist" title="Add to cart"><i class="d-icon-bag"></i></a>
        </div> -->
        <!-- <div class="product-action">
            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
        </div> -->
    </figure>
    <div class="product-details">
        <h3 class="product-name">
            <a href="/foods/{{$details->uuid}}">{{$details->name}}</a>
        </h3>
        <div class="product-price">
            <ins class="new-price">${{$details->price}}</ins>@isset($details->old_price)<del
                class="old-price">{{$details->old_price}}</del>@endisset
        </div>
        <div class="ratings-container">
            @isset($details->rating)<div class="ratings-full">
                <span class="ratings" style="width: 100%"></span>
                <span class="tooltiptext tooltip-top"></span>
            </div>@endisset
            @isset($details->review)<a href="" class="rating-reviews">( {{$details->review}}
                )</a>@endisset

        </div>
        <div class="product-action">
            <div class="product-quantity">
                <button title="calculate" class="quantity-minus d-icon-minus"></button>
                <input title="input" class="quantity form-control" type="number" min="1" max="1000000">
                <button title="calculate" class="quantity-plus d-icon-plus"></button>
            </div>
            <a href="#" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal"
                title="Add to cart" data-product-uuid="{{$details->uuid}}"><i class="d-icon-bag"></i><span>Add to cart</span></a>
        </div>
    </div>
</div>
@else
<div class="product text-center product-with-qty">
    <figure class="product-media">
        <a href="product.html">
            <img src="/assets/images/demos/demo-food3/product/1-280x220.jpg" alt="Blue Pinafore Denim Dress" width="280"
                height="315" style="background-color: #f2f3f5;">
        </a>
        <div class="product-label-group">
            <label class="product-label label-new">new</label>
        </div>
        <div class="product-action-vertical">
            <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal"
                title="Add to cart"><i class="d-icon-bag"></i></a>
            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
        </div>
        <div class="product-action">
            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
        </div>
    </figure>
    <div class="product-details">
        <h3 class="product-name">
            <a href="demo-food3-product.html">Hamburger</a>
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
@endif