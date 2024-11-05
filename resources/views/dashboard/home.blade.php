<x-dashboard-app-layout>
    @role('restaurant')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button
                class="nav-link active"
                id="home-tab"
                data-bs-toggle="tab"
                data-bs-target="#home-tab-pane"
                type="button"
                role="tab"
                aria-controls="home-tab-pane"
                aria-selected="true"
            >
                Order Received
            </button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div
            class="tab-pane fade show active"
            id="home-tab-pane"
            role="tabpanel"
            aria-labelledby="home-tab"
            tabindex="0"
        >
            <x-all-records
                :records="$orderHistory"
                :columns="$foodOrderColumns"
                enableActionColumn="{{ true }}"
                model="foods"
                id="foodOrders"
                enableActionColumn="{{ false }}"
            />
        </div>
    </div>

    <div
        class="modal fade"
        id="foodOrderModal"
        tabindex="-1"
        aria-labelledby="foodOrderModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="foodOrderModalLabel">
                        Order Details
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body food-order-details">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 pr-lg-4">
                            <table class="shop-table cart-table table">
                                <thead>
                                    <tr>
                                        <th><span>Product</span></th>
                                        <th></th>
                                        <th><span>Price</span></th>
                                        <th><span>Quantity</span></th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="order-content"></tbody>
                            </table>
                        </div>
                        {{--
                        <aside class="col-lg-4 sticky-sidebar-wrapper">
                            <div
                                class="sticky-sidebar"
                                data-sticky-options="{'bottom': 20}"
                            >
                                <div class="summary mb-4">
                                    <h3 class="summary-title text-left">
                                        Cart Totals
                                    </h3>
                                    <table class="shipping">
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">
                                                    Subtotal
                                                </h4>
                                            </td>
                                            <td>
                                                <p
                                                    class="summary-subtotal-price"
                                                >
                                                    ₹{{Cart::subtotal()}}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">
                                                    Tax
                                                </h4>
                                            </td>
                                            <td>
                                                <p
                                                    class="summary-subtotal-price"
                                                >
                                                    ₹{{Cart::tax()}}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">
                                                    Discount
                                                </h4>
                                            </td>
                                            <td>
                                                <p
                                                    class="summary-subtotal-price"
                                                >
                                                    ₹{{Cart::discount()}}
                                                </p>
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="total">
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">
                                                    Total
                                                </h4>
                                            </td>
                                            <td>
                                                <p
                                                    class="summary-total-price ls-s"
                                                >
                                                    ₹{{Cart::total()}}
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </aside>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        const orderDetailModal = document.getElementById("foodOrderModal");
        orderDetailModal.addEventListener("show.bs.modal", (event) => {
            // Button that triggered the modal
            const button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            const orderItems = JSON.parse(button.getAttribute("data-order"));
            let orderContent = "";
            orderItems.items.forEach((item) => {
                orderContent += `<tr class="cart-item-row">
                                <td class="product-thumbnail">
                                    <figure>
                                        <a href="">
                                            <img src="/storage/${
                                                item.productImage
                                            }" width="100" height="100"
                                                alt="product">
                                        </a>
                                    </figure>
                                </td>
                                <td class="product-name">
                                    <div class="product-name-section">
                                        <a href="">${item.name}</a>
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">₹${item.price}</span>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">${item.quantity}</span>
                                </td>
                                <td class="product-price">
                                    <span class="amount">₹${
                                        item.price * item.quantity
                                    }</span>
                                </td>
                            </tr>`;
            });
            orderContent += `<tr><th colspan='4' align='right'>Sub Total</th><td align='right'>₹${orderItems.subtotal}</td></tr><tr><th colspan='4' align='right'>Discount</th><td align='right'>₹${orderItems.discount}</td></tr><tr><th colspan='4' align='right'>Tax</th><td align='right'>₹${orderItems.tax}</td></tr><tr><th colspan='4' align='right'>Total</th><td align='right'>₹${orderItems.total}</td></tr>`;
            const contentArea = orderDetailModal.querySelector(
                ".modal-body #order-content"
            );
            console.log("orderContent", orderContent);
            contentArea.innerHTML = orderContent;
        });
    </script>
    @endpush
    @else
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button
                class="nav-link active"
                id="home-tab"
                data-bs-toggle="tab"
                data-bs-target="#home-tab-pane"
                type="button"
                role="tab"
                aria-controls="home-tab-pane"
                aria-selected="true"
            >
                Order History
            </button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div
            class="tab-pane fade show active"
            id="home-tab-pane"
            role="tabpanel"
            aria-labelledby="home-tab"
            tabindex="0"
        >
            <x-all-records
                :records="$orderHistory"
                :columns="$foodOrderColumns"
                enableActionColumn="{{ true }}"
                model="foods"
                id="foodOrders"
                enableActionColumn="{{ false }}"
            />
        </div>
    </div>

    <div
        class="modal fade"
        id="foodOrderModal"
        tabindex="-1"
        aria-labelledby="foodOrderModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="foodOrderModalLabel">
                        Order Details
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body food-order-details">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 pr-lg-4">
                            <table class="shop-table cart-table table">
                                <thead>
                                    <tr>
                                        <th><span>Product</span></th>
                                        <th></th>
                                        <th><span>Price</span></th>
                                        <th><span>Quantity</span></th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="order-content"></tbody>
                            </table>
                        </div>
                        {{--
                        <aside class="col-lg-4 sticky-sidebar-wrapper">
                            <div
                                class="sticky-sidebar"
                                data-sticky-options="{'bottom': 20}"
                            >
                                <div class="summary mb-4">
                                    <h3 class="summary-title text-left">
                                        Cart Totals
                                    </h3>
                                    <table class="shipping">
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">
                                                    Subtotal
                                                </h4>
                                            </td>
                                            <td>
                                                <p
                                                    class="summary-subtotal-price"
                                                >
                                                    ₹{{Cart::subtotal()}}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">
                                                    Tax
                                                </h4>
                                            </td>
                                            <td>
                                                <p
                                                    class="summary-subtotal-price"
                                                >
                                                    ₹{{Cart::tax()}}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">
                                                    Discount
                                                </h4>
                                            </td>
                                            <td>
                                                <p
                                                    class="summary-subtotal-price"
                                                >
                                                    ₹{{Cart::discount()}}
                                                </p>
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="total">
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">
                                                    Total
                                                </h4>
                                            </td>
                                            <td>
                                                <p
                                                    class="summary-total-price ls-s"
                                                >
                                                    ₹{{Cart::total()}}
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </aside>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        const orderDetailModal = document.getElementById("foodOrderModal");
        orderDetailModal.addEventListener("show.bs.modal", (event) => {
            // Button that triggered the modal
            const button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            const orderItems = JSON.parse(button.getAttribute("data-order"));
            let orderContent = "";
            orderItems.items.forEach((item) => {
                orderContent += `<tr class="cart-item-row">
                                <td class="product-thumbnail">
                                    <figure>
                                        <a href="">
                                            <img src="/storage/${
                                                item.productImage
                                            }" width="100" height="100"
                                                alt="product">
                                        </a>
                                    </figure>
                                </td>
                                <td class="product-name">
                                    <div class="product-name-section">
                                        <a href="">${item.name}</a>
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">₹${item.price}</span>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">${item.quantity}</span>
                                </td>
                                <td class="product-price">
                                    <span class="amount">₹${
                                        item.price * item.quantity
                                    }</span>
                                </td>
                            </tr>`;
            });
            orderContent += `<tr><th colspan='4' align='right'>Sub Total</th><td align='right'>₹${orderItems.subtotal}</td></tr><tr><th colspan='4' align='right'>Discount</th><td align='right'>₹${orderItems.discount}</td></tr><tr><th colspan='4' align='right'>Tax</th><td align='right'>₹${orderItems.tax}</td></tr><tr><th colspan='4' align='right'>Total</th><td align='right'>₹${orderItems.total}</td></tr>`;
            const contentArea = orderDetailModal.querySelector(
                ".modal-body #order-content"
            );
            console.log("orderContent", orderContent);
            contentArea.innerHTML = orderContent;
        });
    </script>
    @endpush
    @endrole
    
</x-dashboard-app-layout>
