<x-form-component
    :fields="$fields"
    :isEditing="$edit"
    actionRoute="{{route('admin.foods.store')}}"
    editRoute="{{ $edit ? route('admin.foods.update', $model->id) : ''}}"
    isSEOEnabled="{{true}}"
    :model="$model"
    updateBtnText="Update Information"
    submitBtnText="Create Food" />

    