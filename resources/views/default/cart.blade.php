@extends('default.layout')
@section('main')
@push('style')
<link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">
@endpush
{{--dd(Cart::count())--}}

<main class="main cart">
    <div class="page-content pt-7 pb-10">
        @include('default.includes.checkout-steps')
        <div class="container mt-7 mb-2">
            <div class="row">
                @if(count($cartItems) > 0)
                <div class="col-lg-8 col-md-12 pr-lg-4">
                    <table class="shop-table cart-table">
                        <thead>
                            <tr>
                                <th><span>Product</span></th>
                                <th></th>
                                <th><span>Price</span></th>
                                <th><span>quantity</span></th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cartItems as $item)
                            <tr class="cart-item-row">
                                <td class="product-thumbnail">
                                    <figure>
                                        <a href="">
                                            <img src="{{$item->options->productImage}}" width="100" height="100"
                                                alt="product">
                                        </a>
                                    </figure>
                                </td>
                                <td class="product-name">
                                    <div class="product-name-section">
                                        <a href="">{{!empty($item->product_name) ? $item->product_name : $item->name }}</a>
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">{{$item->price}}</span>
                                </td>
                                <td class="product-quantity">
                                    <div class="input-group">
                                        <button class="quantity-minus d-icon-minus cartItemDesc"
                                            data-cart-row-id="{{$item->rowId}}"></button>
                                        <input class="quantity form-control" type="number" min="1" max="1000000"
                                            value="{{$item->qty}}">
                                        <button class="quantity-plus d-icon-plus cartItemInc"
                                            data-cart-row-id="{{$item->rowId}}"></button>
                                    </div>
                                </td>
                                <td class="product-price">
                                    <span class="amount">{{$item->price * $item->qty}}</span>
                                </td>
                                <td class="product-close">
                                    <a href="javascript:void(0)" class="product-remove" title="Remove this product"
                                        data-cart-row-id="{{$item->rowId}}">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <div></div>
                            @endforelse

                        </tbody>
                    </table>
                    <div class="cart-actions mb-6 pt-4">
                        <a href="/" class="btn btn-primary btn-md btn-rounded btn-icon-left mr-4 mb-4"><i
                                class="d-icon-arrow-left"></i>Continue Shopping</a>
                        {{--<button type="submit"
                            class="btn btn-outline btn-primary btn-md btn-rounded {{empty($cartItems) || count($cartItems) == 0 ? 'btn-disabled' : ''}}">Clear
                            Cart</button>--}}
                    </div>
                    <!-- <div class="cart-coupon-box mb-8">
                        <h4 class="title coupon-title text-uppercase ls-m">Coupon Discount</h4>
                        <input type="text" name="coupon_code" class="input-text form-control text-grey ls-m mb-4"
                            id="coupon_code" value="" placeholder="Enter coupon code here...">
                        <button type="submit" class="btn btn-md btn-dark btn-rounded btn-outline">Apply
                            Coupon</button>
                    </div> -->
                </div>
                <aside class="col-lg-4 sticky-sidebar-wrapper">
                    <div class="sticky-sidebar" data-sticky-options="{'bottom': 20}">
                        <div class="summary mb-4">
                            <h3 class="summary-title text-left">Cart Totals</h3>
                            <table class="shipping">
                                <tr class="summary-subtotal">
                                    <td>
                                        <h4 class="summary-subtitle">Subtotal</h4>
                                    </td>
                                    <td>
                                        <p class="summary-subtotal-price">{{Cart::subtotal()}}</p>
                                    </td>
                                </tr>
                                <tr class="summary-subtotal">
                                    <td>
                                        <h4 class="summary-subtitle">Tax</h4>
                                    </td>
                                    <td>
                                        <p class="summary-subtotal-price">{{Cart::tax()}}</p>
                                    </td>
                                </tr>
                                <tr class="summary-subtotal">
                                    <td>
                                        <h4 class="summary-subtitle">Discount</h4>
                                    </td>
                                    <td>
                                        <p class="summary-subtotal-price">{{Cart::discount()}}</p>
                                    </td>
                                </tr>
                                <!-- <tr class="sumnary-shipping shipping-row-last">
                                    <td colspan="2">
                                        <h4 class="summary-subtitle">Calculate Shipping</h4>
                                        <ul>
                                            <li>
                                                <div class="custom-radio">
                                                    <input type="radio" id="flat_rate" name="shipping"
                                                        class="custom-control-input" checked="">
                                                    <label class="custom-control-label" for="flat_rate">Flat
                                                        rate</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-radio">
                                                    <input type="radio" id="free-shipping" name="shipping"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="free-shipping">Free
                                                        shipping</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-radio">
                                                    <input type="radio" id="local_pickup" name="shipping"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="local_pickup">Local
                                                        pickup</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                </tr> -->
                            </table>
                            <!-- <div class="shipping-address">
                                <label>Shipping to <strong>CA.</strong></label>
                                <div class="select-box">
                                    <select name="country" class="form-control">
                                        <option value="us" selected="">United States (US)</option>
                                        <option value="uk"> United Kingdom</option>
                                        <option value="fr">France</option>
                                        <option value="aus">Austria</option>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select name="country" class="form-control">
                                        <option value="us" selected="">California</option>
                                        <option value="uk">Alaska</option>
                                        <option value="fr">Delaware</option>
                                        <option value="aus">Hawaii</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control" name="code" placeholder="Town / City">
                                <input type="text" class="form-control" name="code" placeholder="ZIP">
                                <a href="#" class="btn btn-md btn-dark btn-rounded btn-outline">Update
                                    totals</a>
                            </div> -->
                            <table class="total">
                                <tr class="summary-subtotal">
                                    <td>
                                        <h4 class="summary-subtitle">Total</h4>
                                    </td>
                                    <td>
                                        <p class="summary-total-price ls-s">{{Cart::total()}}</p>
                                    </td>
                                </tr>
                            </table>
                            <a href="checkout" class="btn btn-primary btn-rounded btn-checkout">Proceed to
                                checkout</a>
                        </div>
                    </div>
                </aside>
                @else
                <div class="col-lg-12 col-md-12">
                    <div class="alert-danger text-center text-white">
                        <div>Cart is empty.</div>
                        <div><a href="/" class="btn btn-primary btn-md btn-rounded btn-icon-left mr-4 mb-4"><i
                                    class="d-icon-arrow-left"></i>Continue Shopping</a></div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</main>

@endsection