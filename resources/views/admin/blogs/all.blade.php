<x-admin-app-layout>
    @include('admin.success-error-message')

    <!-- <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Categories</li>
        </ol>
    </nav>
    <hr /> -->

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link {{!$errors->any() ? 'active' : ''}}" id="nav-home-tab" data-bs-toggle="tab"
                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All
                Blogs</button>
            <button class="nav-link {{$errors->any() ? 'active' : ''}}" id="nav-profile-tab" data-bs-toggle="tab"
                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                aria-selected="false">Add New Blog</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade p-2 {{!$errors->any() ? 'active show' : ''}}" id="nav-home" role="tabpanel"
            aria-labelledby="nav-home-tab" tabindex="0">
            <x-all-records :records="$records" :columns="$columns" enableActionColumn="{{true}}" model="blogs" />
        </div>

        <div class="tab-pane fade p-2 {{$errors->any() ? ' active show' : '' }}" id="nav-profile" role="tabpanel"
            aria-labelledby="nav-profile-tab" tabindex="0">
            @include('admin.blogs.create')
        </div>
    </div>
</x-admin-app-layout>