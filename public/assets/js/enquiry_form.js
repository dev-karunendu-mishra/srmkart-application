$(document).ready(() => {
    $('#location_dd').change((e) => {
        const location = e.target.value;
        const locations = { "hostel": "location_hostel", "estancia": "location_estancia", "abode": "location_abode" }
        const selectedLocation = locations[location];
        if (selectedLocation) {
            $('.location-options').addClass('d-none');
            $(`#${selectedLocation}`).removeClass('d-none');
        }
    })

    let hostelOptions = "<option value='NA' selected disabled>Select Hostel</option>";
    for (let i = 1; i <= 10; i++) {
        hostelOptions += `<option value='Hostel ${i}'>Hostel ${i}</option>`;
    }
    $("#location_hostel select").html(hostelOptions);

    let estanciaOptions = "<option value='NA' selected disabled>Select Estancia</option>";
    for (let i = 1; i <= 5; i++) {
        estanciaOptions += `<option value='Tower ${i}'>Tower ${i}</option>`;
    }
    $("#location_estancia select").html(estanciaOptions);


    let abodeOptions = "<option value='NA' selected disabled>Select Abode</option>";
    for (let i = 65; i <= 90; i++) {
        if (![73, 79, 85, 88].includes(i)) {
            abodeOptions += `<option value='Block ${String.fromCharCode(i)}'>Block ${String.fromCharCode(i)}</option >`;
        }
    }
    $("#location_abode select").html(abodeOptions);
})