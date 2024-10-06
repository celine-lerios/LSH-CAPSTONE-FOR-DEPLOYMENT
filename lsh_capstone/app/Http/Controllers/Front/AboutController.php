<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    // Function to display the about page
    public function index()
    {
        // Retrieve the about page data from the database
        $about_data = Page::where('id', 1)->first();

        // Return the view 'front.about' with the about page data
        return view('front.about', compact('about_data'));
    }
}
