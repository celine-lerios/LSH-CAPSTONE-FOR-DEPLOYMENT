<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteMail;
use App\Models\Admin;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    // Function to display the contact page
    public function index()
    {
        // Retrieve contact data from the database
        $contact_data = Page::where('id', 1)->first();
        return view('front.contact', compact('contact_data'));
    }

    // Function to send an email from the contact form
    public function send_email(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Return validation errors if validation fails
        if(!$validator->passes()){
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        }else{
            // Send email
            $subject = 'Contact form email';
            $message = 'Visitor email information: <br>';
            $message .= '<br>Name: '.$request->name;
            $message .= '<br>Email: '.$request->email;
            $message .= '<br>Message: '.$request->message;

            // Get admin email address
            $admin_data = Admin::where('id', 1)->first();
            $admin_email = $admin_data->email;

            // Send email to admin
            Mail::to($admin_email)->send(new WebsiteMail($subject, $message));

            // Return success message
            return response()->json(['code'=>1,'success_message'=>'Email has been sent successfully!']);
        }
    }
}
