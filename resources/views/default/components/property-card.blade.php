@if(!empty($details))
<div class="product text-center property-card" data-location="{{$details->location}}"
    data-flat-type="{{$details->flat_type}}" data-vacancy="{{$details->vacancy}}">
    <figure class="product-media">
        <a href="{{$path}}/{{$details->uuid}}">
            @if(!empty($details->images) && count($details->images) > 0)
            <img src="{{asset($details->images->first()->path)}}" alt="{{$details->name}}" width="220" height="245"
                style="background-color: #f2f3f5;">
            @else
            <img src="https://via.placeholder.com/280x315" alt="card image" width="280" height="315"
                style="background-color: #f2f3f5;">
            @endif

        </a>
        <div class="product-label-group">
            <label class="product-label {{$details->status == 'sold' ? 'label-danger' : 'label-new'}}">{{$details->status}}</label>
            <label class="product-label label-new" title="Vacancy {{number_format($details->vacancy, 0)}}">Vacancy - {{ number_format($details->vacancy, 0)}}</label>
        </div>
        <div class="product-action-vertical">
            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
            <!-- <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a> -->
        </div>
        <div class="product-action">
            <a href="{{$path}}/{{$details->uuid}}" class="btn-product" title="Enquiry">View Details</a>
        </div>
    </figure>
    <div class="product-details">
        <div class="product-cat">
            <a>{{$details->location}} - {{$details->flat_type}}</a>
        </div>
        <h3 class=" product-name">
            <a href="{{$path}}/{{$details->uuid}}">{{$details->name}}</a>
        </h3>
        <div class="ratings-container">
            @isset($details->rating)
            <div class="ratings-full">
                <span class="ratings" style="width:40%"></span>
                <span class="tooltiptext tooltip-top"></span>
            </div>
            @endisset
            @isset($details->reviews)<a href="#" class="rating-reviews">( {{$details->reviews}} )</a>@endisset
        </div>
        @if($details->status != 'sold')
        <div class="product-action">
            <a href="{{$path}}/{{$details->uuid}}/enquiry" class="btn btn-primary btn-outline btn-sm btn-rounded font-weight-bold btn-enquiry"
                title="Enquiry Now">Enquiry Now</a>
        </div>
        @endif
    </div>
</div>
@else
<div class="product text-center">
    <figure class="product-media">
        <a href="#">
            <img src="/assets/images/demos/demo1/products/product5.jpg" alt="Blue Pinafore Denim Dress" width="220"
                height="245" style="background-color: #f2f3f5;">
        </a>
        <div class="product-action-vertical">
            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                                data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
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
            <a href="#" class="btn btn-primary btn-outline btn-rounded font-weight-bold" title="Enquiry Now">Enquiry Now</a>
        </div>
    </div>
</div>
@endif