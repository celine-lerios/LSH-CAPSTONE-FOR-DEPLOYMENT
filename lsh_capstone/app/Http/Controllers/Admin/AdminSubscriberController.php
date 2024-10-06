<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminSubscriberController extends Controller
{
    // Function to display all active subscribers
    public function index()
    {
        $subscriber = Subscriber::where('status', 1)->get();
        return view('admin.subscriber_show', compact('subscriber'));
    }

    // Function to show the form for sending an email to subscribers
    public function send_email()
    {
        return view('admin.subscriber_send_email');
    }

    // Function to process the email sending request
    public function submit_email(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);

        // Retrieve the subject and message from the request
        $subject  = $request->subject;
        $message = $request->message;

        // Retrieve all active subscribers
        $all_subscribers = Subscriber::where('status', 1)->get();

        // Send an email to each subscriber
        foreach($all_subscribers as $item)
        {
            Mail::to($item->email)->send(new WebsiteMail($subject, $message));
        }

        return redirect()->back()->with('success', 'Email has been sent successfully');
    }
}
