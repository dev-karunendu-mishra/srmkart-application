@extends('default.layout')
@section('main')
@push('style')
<link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">
@endpush
<main class="main checkout">
    <div class="page-content pt-7 pb-10 mb-10">
        @include('default.includes.checkout-steps')
        <div class="container mt-7">
            @auth

            @else
            <div class="card accordion">
                <div class="alert alert-light alert-primary alert-icon mb-4 card-header">
                    <i class="fas fa-exclamation-circle"></i>
                    <span class="text-body">Returning customer?</span>
                    <a href="#alert-body1" class="text-primary login-toggle link-to-tab d-md-show expand">Click here to login/register</a>
                </div>
                {{--<div class="alert-body collapsed" id="alert-body1">
                    <p>If you have shopped with us before, please enter your details below.
                        If you are a new customer, please proceed to the Billing section.</p>
                    <form class="mb-4 mb-md-0" method="post" action="{{ route('login') }}">
                        <div class="row cols-md-2">

                            @csrf
                            <div>
                                <label for="username">Username Or Email *</label>
                                <input type="text" class="input-text form-control mb-0" name="email" id="username"
                                    autocomplete="username" />
                                <x-input-error-new :messages="$errors->get('email')" class="mt-2 text-danger" />
                            </div>

                            <div>
                                <label for="password">Password *</label>
                                <input class="input-text form-control mb-0" type="password" name="password"
                                    id="password" autocomplete="current-password" />
                                <x-input-error-new :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>
                        <div class="checkbox d-flex align-items-center justify-content-between">
                            <div class="form-checkbox pt-0 mb-0">
                                <input type="checkbox" class="custom-checkbox" id="signin-remember"
                                    name="signin-remember" />
                                <label class="form-control-label" for="signin-remember">Remember
                                    Me</label>
                            </div>
                            <a href="{{ route('password.request') }}" class="lost-link">Lost your password?</a>
                        </div>
                        <div class="link-group">
                            <button type="submit" class="btn btn-dark btn-rounded mb-4">Login</button>
                            <!-- <span class="d-inline-block text-body font-weight-semi-bold">or Login With</span>
                        <div class="social-links mb-4">
                            <a href="#" class="social-link social-google fab fa-google"></a>
                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                        </div> -->
                        </div>
                    </form>
                </div>--}}
            </div>
            @endauth
            <!-- <div class="card accordion">
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
            </div> -->
            @if ($errors->any())
            <div class="alert alert-danger text-white mb-3">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="post" action="{{route('place-order')}}" class="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-7 mb-6 mb-lg-0 pr-lg-4">
                        <h3 class="title title-simple text-left text-uppercase">Billing Details</h3>
                        <label>Name *</label>
                        <input type="text" class="form-control" name="name" value="{{!empty(old('name')) ? old('name') : (!empty($lastFoodOrder) ? $lastFoodOrder->name : '')}}" required />

                        <label>Phone *</label>
                        <input type="text" class="form-control" name="mobile" value="{{!empty(old('mobile')) ? old('mobile') : (!empty($lastFoodOrder) ? $lastFoodOrder->mobile : '')}}" required />

                        <label>Email Address *</label>
                        <input type="email" class="form-control" name="email" value="{{!empty(old('email')) ? old('email') : (!empty($lastFoodOrder) ? $lastFoodOrder->email : '')}}" required />

                        <!-- <label>Company Name (Optional)</label>
                    <input type="text" class="form-control" name="company-name" required=""> -->
                        <label>Location *</label>
                        <select name="location" class="form-control" id="location_dd">
                            <option value="NA" selected disabled>Select Location</option>
                            <option value="hostel" {{$location == 'hostel' ? 'selected' : ''}}>Hostel</option>
                            <option value="estancia" {{$location == 'estancia' ? 'selected' : ''}}>Estancia</option>
                            <option value="abode" {{$location == 'abode' ? 'selected' : ''}}>Abode</option>
                        </select>

                        <div id="location_hostel" class="location-options {{$location == 'hostel' ? '' : 'd-none'}}">
                            <label>Hostel *</label>
                            <select name="hostel" class="form-control">
                                <option value="NA" selected disabled>Select Hostel</option>
                                @foreach($hostels as $hostel)
                                    <option value="{{$hostel}}" {{!empty($lastFoodOrder) && $hostel == $lastFoodOrder->hostel ? 'selected' : ''}}>{{$hostel}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="location_estancia" class="location-options {{$location == 'estancia' ? '' : 'd-none'}}">
                            <label>Estancia *</label>
                            <select name="estancia" class="form-control">
                                <option value="NA" selected disabled>Select Estancia</option>
                                @foreach($estanciaOptions as $estancia)
                                    <option value="{{$estancia}}" {{!empty($lastFoodOrder) && $estancia == $lastFoodOrder->estancia ? 'selected' : ''}}>{{$estancia}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="location_abode" class="location-options {{$location == 'abode' ? '' : 'd-none'}}">
                            <label>Abode *</label>
                            <select name="abode" class="form-control">
                                <option value="NA" selected disabled>Select Abode</option>
                                @foreach($abodeOptions as $abode)
                                    <option value="{{$abode}}" {{!empty($lastFoodOrder) && $abode == $lastFoodOrder->abode ? 'selected' : ''}}>{{$abode}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label>Flat No. / Room No. *</label>
                        <input type="text" class="form-control" name="flat_no" value="{{!empty(old('flat_no')) ? old('flat_no') : (!empty($lastFoodOrder) ? $lastFoodOrder->flat_no : '')}}" required>
                        <h2 class="title title-simple text-uppercase text-left">Additional Information</h2>
                        <div id="" class="">
                            <label>Slot *</label>
                            <x-slot-deadline defaultOption="Select Slot" :slotOptions="$slotOptions"/>
                        </div>
                        <label>Order Notes (Optional)</label>
                        <textarea name="message" class="form-control pb-2 pt-2 mb-0" cols="30" rows="5"
                            placeholder="Notes about your order, e.g. special notes for delivery" value="{{old('message')}}"></textarea>
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
                                        @foreach(Cart::content() as $item)
                                        <tr>
                                            <td class="product-name">{{$item->name}} <span
                                                    class="product-quantity">×&nbsp;{{$item->qty}}</span></td>
                                            <td class="product-total text-body">₹{{$item->price * $item->qty}}</td>
                                        </tr>
                                        @endforeach
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">Subtotal</h4>
                                            </td>
                                            <td class="summary-subtotal-price pb-0 pt-0">
                                                ₹{{Cart::subTotal()}}
                                            </td>
                                        </tr>
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">Tax</h4>
                                            </td>
                                            <td class="summary-subtotal-price pb-0 pt-0">
                                                ₹{{Cart::tax()}}
                                            </td>
                                        </tr>
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">Discount</h4>
                                            </td>
                                            <td class="summary-subtotal-price pb-0 pt-0">
                                                ₹{{Cart::discount()}}
                                            </td>
                                        </tr>
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">Delivery Charge</h4>
                                            </td>
                                            <td class="summary-subtotal-price pb-0 pt-0">
                                                ₹{{Cart::count() > 0 && Cart::total() <= 100 ? 20 : 0 }}
                                            </td>
                                        </tr>
                                       
                                        <tr class="summary-total">
                                            <td class="pb-0">
                                                <h4 class="summary-subtitle">Total</h4>
                                            </td>
                                            <td class=" pt-0 pb-0">
                                                <p class="summary-total-price ls-s text-primary">
                                                    ₹{{Cart::count() > 0 && Cart::total() <= 100 ? (Cart::total() + 20) : Cart::total() }}</p>
                                            </td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td class="w-100" style="padding-block: 8px;">
                                                <img src="/assets/images/qr.jpg" alt="QR LOGO" width="150px" height="150px">
                                            </td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td class="w-100" style="text-align: left;padding-block: 8px;">
                                                <label>Make Payment and Attach screenshot here *</label>
                                                <input name="attachment" type="file" class="" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- <div class="payment accordion radio-type">
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
                                </div> -->
                                <div class="form-checkbox mt-4 mb-5">
                                    <input type="checkbox" class="custom-checkbox" id="terms-condition"
                                        name="terms-condition">
                                    <label class="form-control-label" for="terms-condition">
                                        I have read and agree to the website <a href="/terms-and-conditions">terms and conditions
                                        </a>*
                                    </label>
                                </div>
                                <input type="hidden" name="payment_method" value="cod" />
                                <button type="submit" class="btn btn-primary btn-rounded btn-order">Place
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
<script>
   $(document).ready(() => {
    $('#location_dd').change((e) => {
        const location = e.target.value;
        const locations = { "hostel": "location_hostel", "estancia": "location_estancia", "abode": "location_abode" }
        const selectedLocation = locations[location];
        if (selectedLocation) {
            $('.location-options').addClass('d-none');
            $(`#${selectedLocation}`).removeClass('d-none');
        }
    })
})
</script>
@endpush