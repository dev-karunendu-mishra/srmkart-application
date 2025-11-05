@if(!empty($details))
<div class="product seller-product-card text-center product-with-qty" data-product-name="{{$details->product_name}}" data-category="{{$details->category}}" data-condition="{{$details->condition}}" data-price="{{$details->price}}" data-max-price="{{$details->max_price}}">
    <figure class="product-media">
        <a href="/buy/{{$details->uuid}}">
            @if(!empty($details->images) && count($details->images) > 0)
            <img src="{{ asset($details->images->first()->path) }}" alt="{{$details->name}}" width="280" height="315"
                style="background-color: #f2f3f5;">
            @else
            <img src="https://via.placeholder.com/280x315" alt="card image" width="280" height="315"
                style="background-color: #f2f3f5;">
            @endif
        </a>
        
        <div class="product-label-group">
            @isset($details->category)
            <label class="product-label label-new">{{$details->category}}</label>
            @endisset
            @isset($details->condition)
            <label class="product-label label-new">{{$details->condition}}</label>
            @endisset
        </div>
       
    </figure>
    <div class="product-details">
        <h3 class="product-name">
            <a href="/buy/{{$details->uuid}}">{{$details->product_name}}</a>
        </h3>
        <div class="product-price">
            <ins class="new-price mr-2">₹{{$details->price}}</ins>-@isset($details->max_price)<ins
                class="new-price ml-2">₹{{$details->max_price}}</ins>@endisset
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
            {{--<div class="product-quantity">
                <button title="calculate" class="quantity-minus d-icon-minus"></button>
                <input title="input" class="quantity form-control" type="number" min="1" value="1" max="1000000">
                <button title="calculate" class="quantity-plus d-icon-plus"></button>
            </div>--}}
            <a href="javascript:void(0)" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal"
                title="Add to cart" data-product-uuid="{{$details->uuid}}"><i class="d-icon-bag"></i><span>Add to
                    cart</span></a>
        </div>
    </div>
</div>
@endif