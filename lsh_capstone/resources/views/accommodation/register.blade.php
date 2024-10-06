@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->signup_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <form action="{{route('accommodation_register_submit')}}" method="post">
                    @csrf
                    <div class="login-form">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="accommodationTypeSelect" class="form-label">Accommodation Type</label>
                                <select class="form-control @if($errors->has('accommodation_type_id')) is-invalid @endif" id="accommodationTypeSelect" name="accommodation_type_id" value="{{ old('accommodation_type_id') }}">
                                @php 
                                $accommodation_types = \App\Models\AccommodationType::get();
                                @endphp
                                <option>-- Select an accommodation type --</option>
                                @foreach($accommodation_types as $accommodation_type)
                                <option value="{{ $accommodation_type->id }}">{{ $accommodation_type->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        

                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Accommodation Name</label>
                            <input type="text" class="form-control" name="name">
                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="text" class="form-control" name="contact_email">
                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('contact_email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" name="contact_number">
                            @if($errors->has('contact_number'))
                                <span class="text-danger">{{ $errors->first('contact_number') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address">
                            @if($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        {{-- <div class="mb-3">
                            <label for="" class="form-label">Map Iframe Code</label>
                            <input type="text" class="form-control" name="map">
                            @if($errors->has('map'))
                                <span class="text-danger">{{ $errors->first('map') }}</span>
                            @endif
                        </div> --}}
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                            @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password">
                            @if($errors->has('confirm_password'))
                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">Register</button>
                        </div>
                        <div class="mb-3">
                            Already have an account?
                            <a href="{{ route('customer_login') }}" class="primary-color"> Login instead.</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

