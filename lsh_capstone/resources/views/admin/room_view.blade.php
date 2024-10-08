@extends('admin.layout.app')

@section('heading', $accommodation->name.' Rooms')

@section('right_top_button')
<a href="{{ route('admin_room_add', $accommodation->id) }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
@endsection
@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Photo</th>
                                        <th>Accommodation Name</th>
                                        <th>Room</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach($rooms as $row)
                                    @php 
                                    $i++; 
                                    
                                    $accommodation_info = \App\Models\Accommodation::where('id', $row->accommodation_id)->first();
                                    $accommodation_type_info = \App\Models\AccommodationType::where('id', $accommodation_info->accommodation_type_id)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('uploads/'.$row->featured_photo) }}" alt="slide_image" class="w_200"></td>
                                        <td>{{ $accommodation->name }}</td>
                                        <td>{{ $row->room_name }}</td>
                                        @if($accommodation_type_info->name != 'Hotel')
                                        <td>₱{{ $row->price }}/month</td>
                                        @else
                                        <td>₱{{ $row->price }}/night</td>
                                        @endif
                                        <td class="pt_10 pb_10">
                                            <button class="btn btn-warning mb-1" data-toggle="modal" data-target="#exampleModal{{ $i }}" data-toggle="tooltip" data-placement="top" title="Detail">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </button>
                                            <a href="{{ route('admin_room_gallery',$row->id) }}" class="btn btn-success mb-1" data-toggle="tooltip" data-placement="top" title="Gallery">
                                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin_room_edit',$row->id) }}" class="btn btn-primary mb-1" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin_room_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Detail</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Photo</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <img src="{{ asset('uploads/'.$row->featured_photo) }}" alt="" class="w_200">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Name</label></div>
                                                            <div class="col-md-8">{{ $row->room_name }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Description</label>
                                                            </div>
                                                            <div class="col-md-8">{!! $row->description !!}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                @if($accommodation_type_info->name != 'Hotel')
                                                                <label class="form-label">Price (per month)</label>
                                                                @else
                                                                <label class="form-label">Price (per night)</label>
                                                                @endif
                                                            </div>
                                                            <div class="col-md-8">₱{{ $row->price }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Total Rooms</label>
                                                            </div>
                                                            <div class="col-md-8">{{ $row->total_rooms }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Amenities</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                @php
                                                                    $arr = explode(',', $row->amenities);
                                                                    for($j=0; $j<count($arr); $j++) {
                                                                        $temp_row = \App\Models\Amenity::where('id', $arr[$j])->first();
                                                                        echo $temp_row->name .'<br>';
                                                                    }
                                                                @endphp
                                                            </div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Room Size</label>
                                                            </div>
                                                            <div class="col-md-8">{{ $row->size }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Total Beds</label>
                                                            </div>
                                                            <div class="col-md-8">{{ $row->total_beds }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Total Bathrooms</label>
                                                            </div>
                                                            <div class="col-md-8">{{ $row->total_bathrooms }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Total Balconies</label>
                                                            </div>
                                                            <div class="col-md-8">{{ $row->total_balconies }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Total Guests</label>
                                                            </div>
                                                            <div class="col-md-8">{{ $row->total_guests }}</div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Video</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="iframe-container-1">
                                                                    <iframe  width="560" height="315" src="https://www.youtube.com/embed/{{ $row->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
