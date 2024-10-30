<x-admin-app-layout>
    @include('admin.success-error-message')

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link {{!$errors->any() ? 'active' : ''}}" id="nav-home-tab" data-bs-toggle="tab"
                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All Courses</button>
            <button class="nav-link {{$errors->any() ? 'active' : ''}}" id="nav-profile-tab" data-bs-toggle="tab"
                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                aria-selected="false">Add Course</button>
            <button class="nav-link" id="nav-course-tab" data-bs-toggle="tab" data-bs-target="#nav-course"
                type="button" role="tab" aria-controls="nav-course" aria-selected="false">Course Enquiries</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade p-2 {{!$errors->any() ? 'active show' : ''}}" id="nav-home" role="tabpanel"
            aria-labelledby="nav-home-tab" tabindex="0">
            <x-all-records :records="$records" :columns="$columns" enableActionColumn="{{true}}" model="courses"  id="all-course"/>
        </div>

        <div class="tab-pane fade p-2 {{$errors->any() ? ' active show' : '' }}" id="nav-profile" role="tabpanel"
            aria-labelledby="nav-profile-tab" tabindex="0">
            @include('admin.courses.create')
        </div>

        <div class="tab-pane fade" id="nav-course" role="tabpanel" aria-labelledby="nav-course-tab" tabindex="0">
            <x-all-records :records="$courseEnquiries" :columns="$courseColumns" enableActionColumn="{{true}}"
                model="foods" id="courseEnquiries" />
        </div>
    </div>
</x-admin-app-layout>