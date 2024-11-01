<div class="row">
    <div class="col-md-5">
        <x-preview-images :images="!empty($model->images) ? $model->images : null" />
    </div>
    <div class="col-md-7">
        <x-form-component :fields="$fields" :isEditing="$edit" actionRoute="{{route('admin.properties.store')}}"
            editRoute="{{ $edit ? route('admin.properties.update', $model->id) : ''}}" isSEOEnabled="{{true}}"
            :model="$model" updateBtnText="Update Information" submitBtnText="Add Property" />
    </div>
</div>

@push('scripts')
<script>
    $('#location').change((e) => {
        const location = e.target.value;
        const locations = { "Estancia": "Estancia", "Abode": "Abode" }
        const selectedLocation = locations[location];
        const flatTypes = { Estancia: ["3 BHK 3 Washroom", "3 BHK 2 Washroom", "2.75 BHK 2 Washroom"], Abode: ["3 BHK 3 Washroom", "3 BHK 2 Washroom", "2.75 BHK 2 Washroom", "2.5 BHK 2 Washroom"] };
        if (selectedLocation) {
            let hostelOptions = "<option value='NA' selected disabled>Select Flat Type</option>";
            flatTypes[selectedLocation].forEach((fType) => {
                hostelOptions += `<option value='${fType}'>${fType}</option>`;
            })
            $("#flat_type").html(hostelOptions);
        }
    })

    $(document).ready(function(){
        const location = document.getElementById('location').value;
        const locations = { "Estancia": "Estancia", "Abode": "Abode" }
        const selectedLocation = locations[location];
        const flatTypes = { Estancia: ["3 BHK 3 Washroom", "3 BHK 2 Washroom", "2.75 BHK 2 Washroom"], Abode: ["3 BHK 3 Washroom", "3 BHK 2 Washroom", "2.75 BHK 2 Washroom", "2.5 BHK 2 Washroom"] };
        if (selectedLocation) {
            let hostelOptions = "<option value='NA' selected disabled>Select Flat Type</option>";
            flatTypes[selectedLocation].forEach((fType) => {
                hostelOptions += `<option value='${fType}'>${fType}</option>`;
            })
            $("#flat_type").html(hostelOptions);
        }
    })

</script>
@endpush