<table id="{{!empty($id) ? $id : 'example'}}" class="table table-striped data-table" style="width:100%">
    <thead>
        <tr>
            @foreach($columns as $key=>$column)
            <th>{{$column}}</th>
            @endforeach
            @if($enableActionColumn)
            <th></th>
            @endif

        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)

        <tr>
            @foreach($columns as $key=>$column)
            @switch($key)
            @case('email')
            <td><a href="mailto:{{$record->$key}}">{{$record->$key}}</a></td>
            @break
            @case('images')
            <td>
                {{--@if(!empty($record->$key) && count($record->$key) > 0)
                <img src="{{asset($record->$key[0]->path)}}" class="img-thumbnail" alt="{{$record->$key[0]->path}}"
                    height="75" width="75" />
                @else
                <img src="https://via.placeholder.com/75x75" class="img-fluid" alt="" />
                @endif--}}
                @if(!empty($record->$key) && count($record->$key) > 0)
                <embed src="{{asset($record->$key->first()->path)}}" width="100" height="100" />
                @endif

            </td>
            @break
            @case('attachments')
            <td>

                <button type="button" class="btn btn-sm" title="Download Attachments" data-bs-toggle="modal"
                    data-bs-target="#attachmentDownloadModal"
                    data-attachments="{{json_encode($record->images)}}">{{count($record->images)}} Files</button>
            </td>
            @break
            @case('status')
            <td>
                <!-- <select class="form-control form-control-sm">
                    <option disabled>Select State</option>
                    @foreach($statusOptions as $option)
                    <option value="{{$option}}">{{$option}}</option>
                    @endforeach
                </select> -->
                <x-status-update-control :currentState="$record->status" :record="$record" :updateRoute="$updateRoute" :statusOptions="$statusOptions"/>
            </td>
            @break
            @case('order_status')
            <td>
                {{--<select class="form-control form-control-sm">
                    <option disabled>Select State</option>
                    @foreach($statusOptions as $option)
                    <option value="{{$option}}">{{$option}}</option>
                    @endforeach
                </select>--}}
                <x-status-update-control :currentState="$record->order->status" :record="$record" :updateRoute="$updateRoute" :statusOptions="$statusOptions"/>
            </td>
            @break
             @case('order_amount')
            <td>
                {{$record->order->total}}
            </td>
            @break
            @case('location')
            <td>{{!empty($record->hostel) ? "Hostel : ".$record->hostel : (!empty($record->estancia) ? "Estancia :
                ".$record->estancia : (!empty($record->abode) ? "Abode : ".$record->abode : (!empty($record->$key) ?
                $record->$key :'NA')))}}</td>
            @break
            @case('file_path')
            <td><img src="{{asset($record->$key)}}" class="img-thumbnail" alt="{{$record->$key}}" height="75"
                    width="75" /></td>
            @break
            @case('profile')
            <td><img src="{{asset($record->$key)}}" class="img-thumbnail" alt="{{$record->$key}}" height="75"
                    width="75" /></td>
            @break
            @case('parent')
            <td>{{!empty($record->$key) ? $record->$key->name : 'NA'}}</td>
            @break
            @case('product_url')
            @if(!empty($record->$key))
            <td><a href="{{url($record->$key)}}" target="_blank">{{$record->$key}}</a></td>
            @else
            <td>NA</td>
            @endif

            @break
            @case('category_id')
            <td>{{!empty($record->category) ? $record->category->name : 'NA'}}</td>
            @break
            @case('product_id')
            <td>{{!empty($record->product) ? $record->product->name : 'NA'}}</td>
            @break
            @case('package_id')
            <td>{{!empty($record->package) ? $record->package->name.' Rs : '. $record->package->price : 'NA'}}</td>
            @break
            @case('selected_attributes')
            <td>
                @if(!empty($record->selected_attributes))
                <ul>
                    @foreach($record->selected_attributes as $attribute => $value)
                    <li><strong>{{ ucfirst($attribute) }}:</strong> {{ $value }}</li>
                    @endforeach
                </ul>
                @else
                NA
                @endif
            </td>
            @break
            @case('brand_id')
            <td>{{!empty($record->brand) ? $record->brand->name : 'NA'}}</td>
            @break
            @case('order_id')
            <td><button class="btn btn-sm" title="Food Order" data-bs-toggle="modal" data-bs-target="#foodOrderModal"
                    data-order="{{json_encode($record->order)}}">{{$record->order->order_id}}</button></td>
            @break
            @case('created_at')
            <td>{{!empty($record->created_at) ?
                \Carbon\Carbon::parse($record->$key)->timezone('Asia/Kolkata')->format('d-m-Y') : 'NA'}}</td>
            @break
            @default
            <td>{{$record->$key}}</td>
            @endswitch

            @endforeach


            @if($enableActionColumn)
            <td class="text-center">
                <form action='{{ route("admin.$model.destroy", $record->id) }}' method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <div class="btn-group" role="group">
                        @if($canEdit)
                        <a href='{{url("/admin/$model/".$record->id."/edit")}}' class="btn btn-warning btn-sm"><span
                                class="ti ti-edit fs-4"></span></a>
                        @endif
                        @if($canDelete)
                        <button class="btn btn-danger btn-sm" type="submit"><span
                                class="ti ti-trash fs-4"></span></button>
                        @endif
                        @if($showDownload && count($record->images) > 0 )
                        <button type="button" class="btn btn-success btn-sm" title="Download Attachments"
                            data-bs-toggle="modal" data-bs-target="#attachmentDownloadModal"
                            data-attachments="{{json_encode($record->images)}}"><span
                                class=" ti ti-download fs-4"></span> Download</button>
                        @endif
                    </div>
                </form>
            </td>
            @endif


        </tr>
        @endforeach

    </tbody>
    {{--
    <tfoot>
        <tr>
            @foreach($columns as $column)
            <th>{{$column}}</th>
            @endforeach
            @if($enableActionColumn)
            <th></th>
            @endif
        </tr>
    </tfoot>--}}
</table>

<!-- Modal -->
<div class="modal fade" id="attachmentDownloadModal" tabindex="-1" aria-labelledby="attachmentDownloadModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Attachments</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="attachmentData" class="d-flex gap-2">
                    {{--@foreach($records->first()->images as $attachment)
                    <div class="d-inline-block border rounded-4 p-1 d-flex flex-column align-items-center">
                        <div class=""><embed class="rounded-4" src="{{asset($attachment->path)}}" width="100"
                                height="100" />
                        </div>
                        <div><a href="{{asset($attachment->path)}}" class="btn btn-success" download><small><span
                                        class="ti ti-download fs-4"></span><span>Download</span></small></a></div>
                    </div>
                    @endforeach--}}
                </div>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- FoodOrder Modal -->


<script src="{{url('/template-resources/admin/assets/js/dt-table.js')}}"></script>