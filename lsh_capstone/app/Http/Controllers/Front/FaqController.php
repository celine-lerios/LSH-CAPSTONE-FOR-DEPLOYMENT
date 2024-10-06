<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // Function to display the FAQ page
    public function index()
    {
        // Retrieve all FAQs
        $faq_all = Faq::where('remark', 'active')->get();
        return view('front.faq',compact('faq_all'));
    }
}
