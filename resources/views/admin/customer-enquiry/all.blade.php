<x-admin-app-layout>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Delivery agent's Applications</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Assignment writer's Applications</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Essentials Requests</button>
        </li>
        
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
            tabindex="0">
            <x-all-records :records="$deliveryAgentEnquiries" :columns="$deliveryAgentEnquiriesColumns" enableActionColumn="{{false}}" model="" enableActionColumn="{{true}}" model="assignments" canEdit="{{false}}" canDelete="{{false}}" showDownload="{{true}}" id="deliveryAgentEnquiries" />
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <x-all-records :records="$assignmentWriterEnquiries" :columns="$assignmentWriterEnquiriesColumns" enableActionColumn="{{false}}" model="" enableActionColumn="{{true}}" model="assignments" canEdit="{{false}}" canDelete="{{false}}" showDownload="{{true}}" id="assignmentWriterEnquiries"/>
        </div>
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
            <x-all-records :records="$essentialEnquiries" :columns="$essentialEnquiriesColumns" enableActionColumn="{{false}}" model="" id="essentialEnquiries"/>
        </div>
    </div>
</x-admin-app-layout>