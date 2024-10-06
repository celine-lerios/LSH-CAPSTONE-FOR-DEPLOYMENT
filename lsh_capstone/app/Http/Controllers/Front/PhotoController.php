<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    // Function to display the photo gallery
    public function index()
    {
        // Paginate all photos to display 12 per page
        $photo_all = Photo::where('remark', 'active')->paginate(12); 
        return view('front.photo_gallery',compact('photo_all'));
    }
}
