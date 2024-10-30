<form action="{{ route($updateRoute, $record->id) }}" method="POST">
    @method('PUT')
    @csrf
    <select class="form-control form-control-sm" name="status" onchange="this.form.submit()">
        <option disabled>Select State</option>
        @foreach($statusOptions as $key=>$option)
        <option value="{{$key}}" {{$key == $currentState ? 'selected' : ''}}>{{$option}}</option>
        @endforeach
    </select>

</form>