@extends('front.layout.app')

@section('main_content')

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->payment_heading }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 checkout-left mb_30">
                @php
                $arr_cart_room_id = array();
                $i=0;
                foreach(session()->get('cart_room_id') as $value) {
                    $arr_cart_room_id[$i] = $value;
                    $i++;
                }
                $arr_cart_checkin_date = array();
                $i=0;
                foreach(session()->get('cart_checkin_date') as $value) {
                    $arr_cart_checkin_date[$i] = $value;
                    $i++;
                }
                $arr_cart_checkout_date = array();
                $i=0;
                foreach(session()->get('cart_checkout_date') as $value) {
                    $arr_cart_checkout_date[$i] = $value;
                    $i++;
                }
                $arr_cart_adult = array();
                $i=0;
                foreach(session()->get('cart_adult') as $value) {
                    $arr_cart_adult[$i] = $value;
                    $i++;
                }
                $arr_cart_children = array();
                $i=0;
                foreach(session()->get('cart_children') as $value) {
                    $arr_cart_children[$i] = $value;
                    $i++;
                }
                $total_price = 0;
                for($i=0;$i<count($arr_cart_room_id);$i++)
                {
                    $room_data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();
                    $accommodation = DB::table('accommodations')->where('id', $room_data->accommodation_id)->first();
                    $payment_info = DB::table('payments')->where('accommodation_id', $accommodation->id)->first();
                    $accommodation_type = DB::table('accommodation_types')->where('id', $accommodation->accommodation_type_id)->first();                            
                    $d1 = explode('/',$arr_cart_checkin_date[$i]);
                    $d2 = explode('/',$arr_cart_checkout_date[$i]);
                    $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                    $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
                    $t1 = strtotime($d1_new);
                    $t2 = strtotime($d2_new);
                    $diff = ($t2-$t1)/60/60/24;
                    if($accommodation_type->name != 'Hotel') {
                        $daily_price = $room_data->price / 30;
                        $subtotal = $daily_price * $diff;
                    } else {
                        $subtotal = $room_data->price*$diff;
                    }
                    $total_price = $total_price+($subtotal);
                }
                @endphp
                <h4>Make Payment</h4>
                <select name="payment_method" class="form-control select2" id="paymentMethodChange" autocomplete="off">
                    <option value="">Select Payment Method</option>
                    <option value="Gcash">Gcash</option>
                    <option value="Maya">Maya</option>
                </select>
            <div class="gcash mt_20">
                <div class="container">
                    <h4>Pay with Gcash</h4>
                    <div class="text-center">
                        <img src="{{ asset('uploads/gcash_logo.png') }}" alt="" class="w_100 payment-logo">
                    </div>
                    <div class="mt-3 text-center d-flex align-items-center justify-content-center container">
                        <img src="{{ asset('uploads/'.$payment_info->gcash_qr) }}" alt="" class="payment-qr img-fluid">
                    </div>
                    <div class="text-start mt-3">
                        <p class="fw-semibold mb-0 pb-0">Receiver's Name: <span class="fw-bold">{{ $payment_info->gcash_name }}</span></p>
                        <p class="fw-semibold">Number: <span class="fw-bold mt-0 pt-0">{{ $payment_info->gcash_number }}</span></p>
                    </div>

                </div>
            </div>
            <div class="maya mt_20">
                <div class="container">
                    <h4>Pay with Maya</h4>
                    <div class="text-center">
                        <img src="{{ asset('uploads/maya_logo.png') }}" alt="" class="w_100 payment-logo">
                    </div>
                    <div class="mt-3 text-center d-flex align-items-center justify-content-center container">
                        <img src="{{ asset('uploads/'.$payment_info->maya_qr) }}" alt="" class="payment-qr img-fluid">
                    </div>
                    <div class="text-start mt-3">
                        <p class="fw-semibold mb-0 pb-0">Receiver's Name: <span class="fw-bold">{{ $payment_info->maya_name }}</span></p>
                        <p class="fw-semibold">Number: <span class="fw-bold mt-0 pt-0">{{ $payment_info->maya_number }}</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 checkout-right">
            <div class="inner">
                <h4 class="mb_10">Billing Info</h4>
                <div>
                    Name: <span class="fw-bold">{{ session()->get('billing_name') }}</span>
                </div>
                <div>
                    Email: <span class="fw-bold">{{ session()->get('billing_email') }}</span>
                </div>
                <div>
                    Phone: <span class="fw-bold">{{ session()->get('billing_phone') }}</span>
                </div>
                <div>
                    Country: <span class="fw-bold">{{ session()->get('billing_country') }}</span>
                </div>
                <div>
                    Address: <span class="fw-bold">{{ session()->get('billing_address') }}</span>
                </div>
                <div>
                    City: <span class="fw-bold">{{ session()->get('billing_city') }}</span>
                </div>
                <div>
                    Province: <span class="fw-bold">{{ session()->get('billing_province') }}</span>
                </div>
                <div>
                    Zip: <span class="fw-bold">{{ session()->get('billing_zip') }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 checkout-right">
            <div class="inner">
                <h4 class="mb_10">Cart Details</h4>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            @php
                                $arr_cart_room_id = array();
                                $i=0;
                                foreach(session()->get('cart_room_id') as $value) {
                                    $arr_cart_room_id[$i] = $value;
                                    $i++;
                                }

                                $arr_cart_checkin_date = array();
                                $i=0;
                                foreach(session()->get('cart_checkin_date') as $value) {
                                    $arr_cart_checkin_date[$i] = $value;
                                    $i++;
                                }

                                $arr_cart_checkout_date = array();
                                $i=0;
                                foreach(session()->get('cart_checkout_date') as $value) {
                                    $arr_cart_checkout_date[$i] = $value;
                                    $i++;
                                }

                                $arr_cart_adult = array();
                                $i=0;
                                foreach(session()->get('cart_adult') as $value) {
                                    $arr_cart_adult[$i] = $value;
                                    $i++;
                                }

                                $arr_cart_children = array();
                                $i=0;
                                foreach(session()->get('cart_children') as $value) {
                                    $arr_cart_children[$i] = $value;
                                    $i++;
                                }
                                $total_price = 0;
                                for($i=0;$i<count($arr_cart_room_id);$i++)
                                {
                                    $room_data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();
                                    $accommodation = DB::table('accommodations')->where('id', $room_data->accommodation_id)->first();
                                    $accommodation_type = DB::table('accommodation_types')->where('id', $accommodation->accommodation_type_id)->first();
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ $room_data->room_name }}
                                            <br>
                                            ({{ $arr_cart_checkin_date[$i] }} - {{ $arr_cart_checkout_date[$i] }})
                                            <br>
                                            Adult: {{ $arr_cart_adult[$i] }}, Children: {{ $arr_cart_children[$i] }}
                                        </td>
                                        <td class="p_price">
                                            @php
                                                $d1 = explode('/',$arr_cart_checkin_date[$i]);
                                                $d2 = explode('/',$arr_cart_checkout_date[$i]);
                                                $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                                                $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
                                                $t1 = strtotime($d1_new);
                                                $t2 = strtotime($d2_new);
                                                $diff = ($t2-$t1)/60/60/24;

                                                if($accommodation_type->name != 'Hotel') {
                                                    $daily_price = $room_data->price / 30;
                                                    $subtotal = $daily_price * $diff;
                                                } else {
                                                    $subtotal = $room_data->price*$diff;
                                                }
                                                echo '₱'.number_format($subtotal, 2);
                                            @endphp
                                        </td>
                                    </tr>
                                    @php
                                    $total_price = $total_price+($subtotal);
                                }
                                @endphp                                
                                <tr>
                                    <td><b>Total:</b></td>
                                    <td class="p_price"><b>₱{{ number_format($total_price, 2) }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="container" id="transact_form_gcash">
                        <form action="{{ route('gcash', ['price' => $total_price]) }}" method="post">
                            @csrf
                            <div class="mb-3">
                              <label for="reference-number" class="form-label">Reference Number (Gcash):</label>
                              <input type="text" class="form-control" name="reference_id" placeholder="Input Reference No.">
                              @if($errors->has('reference_id'))
                              <span class="text-danger">{{ $errors->first('reference_id') }}</span>
                          @endif
                      </div>
                      <button type="submit" class="btn btn-success bg-website text-dark fw-bold w-100" onClick="return confirm('In case you want to cancel this booking, there would be a refund for 50% from the admin. Are you sure you want to transact?');">Transact</button>
                  </form>
              </div>

              <div class="container" id="transact_form_maya">
                  <form action="{{ route('maya', ['price' => $total_price]) }}" method="post">
                      @csrf
                      <div class="mb-3">
                        <label for="reference-number" class="form-label">Reference Number (Maya):</label>
                        <input type="text" class="form-control" name="reference_id" placeholder="Input Reference No.">
                    </div>
                    <button type="submit" class="btn btn-success bg-website text-dark fw-bold w-100" onClick="return confirm('In case you want to cancel this booking, there would be a refund for 50% from the admin. Are you sure you want to transact?');">Transact</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection


















