<div class="step-by pr-4 pl-4">
    <h3 class="title title-simple title-step {{Route::currentRouteName() === 'cart' ? 'active' : ''}}"><a href="/cart">1. Shopping Cart</a></h3>
    <h3 class="title title-simple title-step {{Route::currentRouteName() === 'checkout' ? 'active' : ''}}"><a href="/checkout">2. Checkout</a></h3>
    <h3 class="title title-simple title-step">@auth<a href="/order">3. Order Complete</a>@else<a>3. Order
            Complete</a>@endauth
    </h3>
</div>