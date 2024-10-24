@extends('default.layout')
@section('main')
@push('style')
<link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">
@endpush
<main class="main checkout">
    <div class="page-content pt-7 pb-10 mb-10">
        <div class="step-by pr-4 pl-4">
            <h3 class="title title-simple title-step"><a href="/cart">1. Shopping Cart</a></h3>
            <h3 class="title title-simple title-step active"><a href="/checkout">2. Checkout</a></h3>
            <h3 class="title title-simple title-step"><a href="/order">3. Order Complete</a></h3>
        </div>
        <div class="container mt-7">
            @auth

            @else
            <div class="card accordion">
                <div class="alert alert-light alert-primary alert-icon mb-4 card-header">
                    <i class="fas fa-exclamation-circle"></i>
                    <span class="text-body">Returning customer?</span>
                    <a href="#alert-body1" class="text-primary collapse">Click here to login</a>
                </div>
                <div class="alert-body collapsed" id="alert-body1">
                    <p>If you have shopped with us before, please enter your details below.
                        If you are a new customer, please proceed to the Billing section.</p>
                    <div class="row cols-md-2">
                        <form class="mb-4 mb-md-0">
                            <label for="username">Username Or Email *</label>
                            <input type="text" class="input-text form-control mb-0" name="username" id="username"
                                autocomplete="username">
                        </form>
                        <form class="mb-4 mb-md-0">
                            <label for="password">Password *</label>
                            <input class="input-text form-control mb-0" type="password" name="password" id="password"
                                autocomplete="current-password">
                        </form>
                    </div>
                    <div class="checkbox d-flex align-items-center justify-content-between">
                        <div class="form-checkbox pt-0 mb-0">
                            <input type="checkbox" class="custom-checkbox" id="signin-remember" name="signin-remember">
                            <label class="form-control-label" for="signin-remember">Remember
                                Me</label>
                        </div>
                        <a href="#" class="lost-link">Lost your password?</a>
                    </div>
                    <div class="link-group">
                        <a href="#" class="btn btn-dark btn-rounded mb-4">Login</a>
                        <span class="d-inline-block text-body font-weight-semi-bold">or Login With</span>
                        <div class="social-links mb-4">
                            <a href="#" class="social-link social-google fab fa-google"></a>
                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                        </div>
                    </div>
                </div>
            </div>
            @endauth
            <div class="card accordion">
                <div class="alert alert-light alert-primary alert-icon mb-4 card-header">
                    <i class="fas fa-exclamation-circle"></i>
                    <span class="text-body">Have a coupon?</span>
                    <a href="#alert-body2" class="text-primary">Click here to enter your code</a>
                </div>
                <div class="alert-body collapsed" id="alert-body2">
                    <p>If you have a coupon code, please apply it below.</p>
                    <div class="check-coupon-box d-flex">
                        <input type="text" name="coupon_code" class="input-text form-control text-grey ls-m mr-4 mb-4"
                            id="coupon_code" value="" placeholder="Coupon code">
                        <button type="submit" class="btn btn-dark btn-rounded btn-outline mb-4">Apply
                            Coupon</button>
                    </div>
                </div>
            </div>
            <form action="#" class="form">
                <div class="row">
                    <div class="col-lg-7 mb-6 mb-lg-0 pr-lg-4">
                        <h3 class="title title-simple text-left text-uppercase">Billing Details</h3>
                        <label>Name *</label>
                        <input type="text" class="form-control" name="name" required>

                        <label>Phone *</label>
                        <input type="text" class="form-control" name="mobile" required>

                        <label>Email Address *</label>
                        <input type="email" class="form-control" name="email" required>

                        <!-- <label>Company Name (Optional)</label>
                    <input type="text" class="form-control" name="company-name" required=""> -->
                        <label>Location *</label>
                        <select name="location" class="form-control" id="location_dd">
                            <option value="NA" selected disabled>Select Location</option>
                            <option value="hostel">Hostel</option>
                            <option value="estancia">Estancia</option>
                            <option value="abode">Abode</option>
                        </select>

                        <div id="location_hostel" class="location-options d-none">
                            <label>Hostel *</label>
                            <select name="hostel" class="form-control">
                                <option value="NA" selected disabled>Select Hostel</option>
                            </select>
                        </div>

                        <div id="location_estancia" class="location-options d-none">
                            <label>Estancia *</label>
                            <select name="estancia" class="form-control">
                                <option value="NA" selected disabled>Select Estancia</option>
                            </select>
                        </div>

                        <div id="location_abode" class="location-options d-none">
                            <label>Abode *</label>
                            <select name="abode" class="form-control">
                                <option value="NA" selected disabled>Select Abode</option>
                            </select>
                        </div>

                        <label>Flat No. / Room No. *</label>
                        <input type="text" class="form-control" name="flat_no" required>
                        <h2 class="title title-simple text-uppercase text-left">Additional Information</h2>
                        <div id="" class="">
                            <label>Slot *</label>
                            <select name="slot_deadline" class="form-control">
                                <option value="NA" selected disabled>Select Slot</option>
                                <option value="2-3">2-3</option>
                                <option value="5-6">5-6</option>
                                <option value="8-9">8-9</option>
                                <option value="11-12">11-12</option>
                            </select>
                        </div>
                        <label>Order Notes (Optional)</label>
                        <textarea name="message" class="form-control pb-2 pt-2 mb-0" cols="30" rows="5"
                            placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                    </div>


                    <!-- Order Details -->
                    <aside class="col-lg-5 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar mt-1" data-sticky-options="{'bottom': 50}">
                            <div class="summary pt-5">
                                <h3 class="title title-simple text-left text-uppercase">Your Order</h3>
                                <table class="order-table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(Cart::instance('karunendu')->content() as $item)
                                        <tr>
                                            <td class="product-name">{{$item->name}} <span
                                                    class="product-quantity">×&nbsp;{{$item->qty}}</span></td>
                                            <td class="product-total text-body">₹{{$item->price * $item->qty}}</td>
                                        </tr>
                                        @endforeach
                                        <!-- <tr>
                                            <td class="product-name">Mackintosh Poket backpack <span
                                                    class="product-quantity">×&nbsp;1</span></td>
                                            <td class="product-total text-body">$180.00</td>
                                        </tr> -->
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">Subtotal</h4>
                                            </td>
                                            <td class="summary-subtotal-price pb-0 pt-0">
                                                ₹{{Cart::instance('karunendu')->subTotal()}}
                                            </td>
                                        </tr>
                                        <tr class="sumnary-shipping shipping-row-last">
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
                                        </tr>
                                        <tr class="summary-total">
                                            <td class="pb-0">
                                                <h4 class="summary-subtitle">Total</h4>
                                            </td>
                                            <td class=" pt-0 pb-0">
                                                <p class="summary-total-price ls-s text-primary">
                                                    ₹{{Cart::instance('karunendu')->subTotal()}}</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="payment accordion radio-type">
                                    <h4 class="summary-subtitle ls-m pb-3">Payment Methods</h4>
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse1" class="collapse text-body text-normal ls-m">Check
                                                payments
                                            </a>
                                        </div>
                                        <div id="collapse1" class="expanded" style="display: block;">
                                            <div class="card-body ls-m">
                                                Please send a check to Store Name, Store Street,
                                                Store Town, Store State / County, Store Postcode.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse2" class="expand text-body text-normal ls-m">Cash
                                                on delivery</a>
                                        </div>
                                        <div id="collapse2" class="collapsed">
                                            <div class="card-body ls-m">
                                                Pay with cash upon delivery.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-checkbox mt-4 mb-5">
                                    <input type="checkbox" class="custom-checkbox" id="terms-condition"
                                        name="terms-condition">
                                    <label class="form-control-label" for="terms-condition">
                                        I have read and agree to the website <a href="#">terms and conditions
                                        </a>*
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded btn-order">Place
                                    Order</button>
                            </div>
                        </div>
                    </aside>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection
@push('scripts')
<script src="/assets/js/enquiry_form.js"></script>
@endpush