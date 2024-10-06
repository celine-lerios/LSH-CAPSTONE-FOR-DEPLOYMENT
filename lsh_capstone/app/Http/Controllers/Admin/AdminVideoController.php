<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminVideoController extends Controller
{
    // Function to display all videos
    public function index()
    {
        $videos = Video::where('remark', 'active')->get();
        return view('admin.video_view', compact('videos'));
    }

    // Function to show the form for adding a new video
    public function add()
    {
        return view('admin.video_add');
    }

    // Function to store a newly created video in the database
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'video_id' => 'required'
        ]);

        // Create a new Video instance and save it to the database
        $obj = new Video();
        $obj->video_id = $request->video_id;
        $obj->caption = $request->caption;
        $obj->remark = 'active';      
        $obj->save();

        return redirect()->back()->with('success', 'Video is added successfully!');
    }

    // Function to show the form for editing a video
    public function edit($id)
    {
        $video_data = Video::where('id',$id)->first();
        return view('admin.video_edit', compact('video_data'));
    }

    // Function to update the specified video in the database
    public function update(Request $request, $id)
    {
        // Find the video by ID
        $obj = Video::where('id', $id)->first();

        // Update the video's details
        $obj->video_id = $request->video_id;
        $obj->caption = $request->caption;
        $obj->update();

        return redirect()->back()->with('success', 'Video is updated successfully!');
    }

    // Function to delete the specified video from the database
    public function delete($id)
    {
        // Find the video by ID
        $single_data = Video::where('id', $id)->first();
        $single_data->remark = 'deleted';

        // Delete the video from the database
        $single_data->update();

        return redirect()->back()->with('success', 'Video is deleted successfully!');
    }
}
