<x-admin-app-layout>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Seller Listings</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
            tabindex="0">
            <x-all-records :records="$sellerListings" :columns="$sellerListingColumns" enableActionColumn="{{false}}" model="" enableActionColumn="{{false}}" model="assignments" canEdit="{{false}}" canDelete="{{false}}" showDownload="{{false}}" id="deliveryAgentEnquiries" id="sellerListings"  :statusOptions="$statusOptions" :updateRoute="$updateRoute" />
        </div>
    </div>
</x-admin-app-layout>