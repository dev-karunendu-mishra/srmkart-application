<x-admin-app-layout>
   @include('admin.success-error-message')

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link {{!$errors->any() ? 'active' : ''}}" id="nav-home-tab" data-bs-toggle="tab"
                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All
                Properties</button>
            <button class="nav-link {{$errors->any() ? 'active' : ''}}" id="nav-profile-tab" data-bs-toggle="tab"
                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                aria-selected="false">Add Properties</button>
            <button class="nav-link" id="prop-enquiry-tab" data-bs-toggle="tab" data-bs-target="#prop-tab"
                type="button" role="tab" aria-controls="prop-tab" aria-selected="false">Enquiries</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade p-2 {{!$errors->any() ? 'active show' : ''}}" id="nav-home" role="tabpanel"
            aria-labelledby="nav-home-tab" tabindex="0">
            <x-all-records :records="$records" :columns="$columns" enableActionColumn="{{true}}" model="properties" id="all-properties" :statusOptions="$statusOptions" updateRoute="admin.properties.update"/>
        </div>

        <div class="tab-pane fade p-2 {{$errors->any() ? ' active show' : '' }}" id="nav-profile" role="tabpanel"
            aria-labelledby="nav-profile-tab" tabindex="0">
            @include('admin.properties.create')
        </div>

         <div class="tab-pane fade" id="prop-tab" role="tabpanel" aria-labelledby="prop-enquiry-tab" tabindex="0">
            <x-all-records :records="$propertyEnquiries" :columns="$propertyEnquiryColumns" enableActionColumn="{{true}}"
                model="properties" id="propertyEnquiries" canEdit={{false}} canDelete="{{false}}"/>
        </div>
    </div>
</x-admin-app-layout>