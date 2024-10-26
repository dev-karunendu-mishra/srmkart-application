<div class="row">
    <div class="col-md-5">
        <x-preview-images :images="!empty($model->images) ? $model->images : null" />
    </div>
    <div class="col-md-7">
        <x-form-component :fields="$fields" :isEditing="$edit" actionRoute="{{route('admin.internships.store')}}"
            editRoute="{{ $edit ? route('admin.internships.update', $model->id) : ''}}" isSEOEnabled="{{true}}"
            :model="$model" updateBtnText="Update Information" submitBtnText="Add Internship" />
    </div>
</div>