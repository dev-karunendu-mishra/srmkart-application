<x-admin-app-layout>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success {{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                type="button" role="tab" aria-controls="nav-home" aria-selected="true">Internship Enquiries</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Course Enquiries</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Food Orders</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
            tabindex="0">
            <x-all-records :records="$internshipEnquiries" :columns="$internshipColumns" enableActionColumn="{{true}}"
                model="foods" id="internshipEnquiry" />
        </div>

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <x-all-records :records="$courseEnquiries" :columns="$courseColumns" enableActionColumn="{{true}}"
                model="foods" id="courseEnquiries" />
        </div>

        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
            <x-all-records :records="$foodOrders" :columns="$foodOrderColumns" enableActionColumn="{{true}}"
                model="foods" id="foodOrders" enableActionColumn="{{false}}" />

            <!-- Modal -->
            <div class="modal fade" id="foodOrderModal" tabindex="-1" aria-labelledby="foodOrderModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="foodOrderModalLabel">Order Details</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body food-order-details">
                            <div class="row">
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
                                        <tbody id="order-content">

                                        </tbody>
                                    </table>
                                </div>
                                {{--<aside class="col-lg-4 sticky-sidebar-wrapper">
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
                                            </table>

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
                                        </div>
                                    </div>
                                </aside>--}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>

@push('scripts')
<script>
    const orderDetailModal = document.getElementById('foodOrderModal')
    orderDetailModal.addEventListener('show.bs.modal', event => {
        console.log("Hello");
        // Button that triggered the modal


    })
</script>
@endpush