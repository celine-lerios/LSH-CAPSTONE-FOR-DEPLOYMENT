<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    // Function to display the admin profile page
    public function index()
    {
        // Return the view for the admin profile page
        return view('admin.profile');
    }

    // Function to update the admin profile
    public function profileSubmit(Request $request)
    {
        // Retrieve the admin data based on the authenticated admin user's email
        $admin_data = Admin::where('email', Auth::guard('admin')->user()->email)->first();

        // Validate the incoming request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        // Update the password if a new password is provided
        if($request->password != '') {
            $request->validate([
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]);
            $admin_data->password = Hash::make($request->password);
        }

        // Update the profile photo if a new photo is uploaded
        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,jpg,svg,png,webp,gif|max:5120',
            ]);

            // Delete the old profile photo
            unlink(public_path('uploads/'.$admin_data->photo));

            // Generate a unique name for the new photo
            $ext = $request->file('photo')->extension();
            $final_name = 'admin'.'.'.$ext;

            // Move the uploaded photo to the uploads directory
            $request->file('photo')->move(public_path('uploads/'),$final_name);

            // Update the profile photo file name in the database
            $admin_data->photo = $final_name;
        }

        // Update the admin name and email
        $admin_data->name = $request->name;
        $admin_data->email = $request->email;
        $admin_data->update();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile information is saved successfully!');
    }
}
