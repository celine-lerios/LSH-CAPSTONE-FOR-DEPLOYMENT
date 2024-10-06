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
                <form action="{{ route('customer_signup_submit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="login-form">
                        <div class="mb-3">
                            <label for="" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name">
                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="text" class="form-control" name="email">
                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>


                        <div class="mb-3">
                            <label for="" class="form-label">Identification Card Type</label>
                            <select class="form-select" name="id_type" aria-label="Default select example" @if($errors->has('id_type')) is-invalid @endif" name="id_type" value="{{ old('id_type') }}">
                               <option selected>-- Choose your type of ID --</option>
                               <option value="National ID">National ID</option>
                               <option value="Voter's ID">Voter's ID</option>
                               <option value="School ID">School ID</option>
                               <option value="Driver's License">Driver's License</option>
                               <option value="PhilHealth ID">PhilHealth ID</option>
                               <option value="Passport">Passport</option>
                            </select>
                              @if($errors->has('id_type'))
                                <span class="text-danger">{{ $errors->first('id_type') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">ID Image</label>
                            <input type="file" class="form-control form-input @if($errors->has('id_image')) is-invalid @endif" name="id_image" value="{{ old('id_image') }}">
                            @if($errors->has('id_image'))
                                <span class="text-danger">{{ $errors->first('id_image') }}</span>
                            @endif
                        </div>
                       
                        <div class="mb-3">
                            <label for="" class="form-label">Selfie Image</label>
                            <input type="file" class="form-control form-input @if($errors->has('selfie')) is-invalid @endif" name="selfie" value="{{ old('selfie') }}">
                            @if($errors->has('selfie'))
                                <span class="text-danger">{{ $errors->first('selfie') }}</span>
                            @endif
                        </div>
                    
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
                            <button type="submit" class="btn btn-primary bg-website">Submit</button>
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