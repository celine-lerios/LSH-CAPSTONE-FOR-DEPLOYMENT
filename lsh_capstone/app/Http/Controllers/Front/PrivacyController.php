<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    // Function to display the privacy policy page
    public function index()
    {
        // Retrieve privacy policy data from the database
        $privacy_data = Page::where('id', 1)->first();
        return view('front.privacy',compact('privacy_data'));
    }
}

