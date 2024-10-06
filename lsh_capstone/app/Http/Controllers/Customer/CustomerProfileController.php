<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerProfileController extends Controller
{
    // Function to display the customer's profile
    public function index()
    {
        return view('customer.profile');
    }

    // Function to update the customer's profile information
    public function profile_submit(Request $request)
    {
        // Find the customer's data
        $customer_data = Customer::where('email',Auth::guard('customer')->user()->email)->first();

        // Validate the incoming request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        // Update password if provided
        if($request->password!='') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);
            $customer_data->password = Hash::make($request->password);
        }

        // Update profile photo if provided
        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif,svg,webp|max:5120'
            ]);

            // Delete the old photo if exists
            if($customer_data->photo != NULL) {
                unlink(public_path('uploads/'.$customer_data->photo));
            }

            // Upload and save the new photo
            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);

            $customer_data->photo = $final_name;
        }

        // Update other profile information
        $customer_data->name = $request->name;
        $customer_data->email = $request->email;
        $customer_data->phone = $request->phone;
        $customer_data->country = $request->country;
        $customer_data->address = $request->address;
        $customer_data->province = $request->province;
        $customer_data->city = $request->city;
        $customer_data->zip = $request->zip;
        $customer_data->update();

        return redirect()->back()->with('success', 'Profile information is saved successfully.');
    }
}
