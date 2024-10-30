<select name="slot_deadline" class="form-control">
    <option value="NA" selected disabled>{{$defaultOption}}</option>
    @foreach($slotOptions as $option)
    <option value="{{$option->value}}">{{$option->label}}</option>
    @endforeach
    <!-- <option value="2-3">2-3</option>
    <option value="5-6">5-6</option>
    <option value="8-9">8-9</option>
    <option value="11-12">11-12</option> -->
</select>