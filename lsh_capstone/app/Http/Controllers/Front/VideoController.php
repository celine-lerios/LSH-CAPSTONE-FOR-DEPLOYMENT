<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    // Function to display the video gallery
    public function index()
    {
        // Paginate all videos to display 12 per page
        $video_all = Video::where('remark', 'active')->paginate(12);
        return view('front.video_gallery',compact('video_all'));
    }
}

