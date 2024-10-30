<x-admin-app-layout>
    @include('admin.success-error-message')

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All Printouts</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade p-2 active show" id="nav-home" role="tabpanel"
            aria-labelledby="nav-home-tab" tabindex="0">
            <x-all-records :records="$records" :columns="$columns" enableActionColumn="{{true}}" canEdit="{{false}}" canDelete="{{false}}" showDownload="{{true}}" model="print_outs" id="printout" :statusOptions="$statusOptions" :updateRoute="$updateRoute"/>
        </div>
    </div>
</x-admin-app-layout>