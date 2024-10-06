<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    // Function to display the terms and conditions page
    public function index()
    {
        // Retrieve terms and conditions data from the database
        $terms_data = Page::where('id', 1)->first();
        return view('front.terms',compact('terms_data'));
    }
}
