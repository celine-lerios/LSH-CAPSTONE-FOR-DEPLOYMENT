@extends('accommodation.layout.app')

@section('heading', 'Completed Bookings')

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
                                        <th>Reference No</th>
                                        <th>Customer's Name</th>
                                        <th>Payment Method</th>
                                        <th>Selfie</th>
                                        <th>ID</th>
                                        <th>Booking Date</th>
                                        <th>Paid Amount</th>
                                
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($completed_orders as $row)

                                    @php 
                                    $customer_info = \App\Models\Customer::where('id', $row->customer_id)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->transaction_id }}</td>
                                        <td>{{ $customer_info->name }}</td>
                                        <td>{{ $row->payment_method }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/'. $customer_info ->selfie) }}
                                            " alt="selfie" class="w_150">
                                        </td>
                                        <td>
                                            <img src="{{ asset('uploads/'. $customer_info ->id_image) }}"
                                            alt="id" class="w_300 magnific"> 
                                        </td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('d/m/Y', $row->booking_date)->format('F d, Y') }}</td>
                                        <td>₱{{ number_format($row->paid_amount, 2) }}</td>
                                        {{-- <td class="pt_10 pb_10">
                                            <button class="btn btn-success">{{ $row->status }}</button>
                                        </td> --}}
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('accommodation_invoice',$row->id) }}" class="btn btn-info mb-md-0 mb-1" data-toggle="tooltip" data-placement="top" title="Invoice"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></a>
                                        </td>
                                        
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
