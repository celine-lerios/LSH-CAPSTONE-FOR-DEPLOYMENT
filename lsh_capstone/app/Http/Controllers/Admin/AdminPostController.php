<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    // Function to display all posts
    public function index()
    {
        // Retrieve all posts from the database
        $posts = Post::where('remark', 'active')->get();
        // Return the view for displaying posts with the retrieved data
        return view('admin.post_view', compact('posts'));
    }

    // Function to display the form for adding a new post
    public function add()
    {
        // Return the view for adding a new post
        return view('admin.post_add');
    }

    // Function to store a newly added post
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,svg,webp,gif|max:5120',
            'heading' => 'required',
            'short_content' => 'required',
            'content' => 'required'
        ]);

        // Generate a unique name for the photo
        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;

        // Move the uploaded photo to the uploads directory
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        // Create a new Post model instance and save it to the database
        $obj = new Post();
        $obj->photo = $final_name;
        $obj->heading = $request->heading;
        $obj->short_content = $request->short_content;
        $obj->content = $request->content;
        $obj->total_view = 1;
        $obj->remark = 'active';
        $obj->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Post is added successfully!');
    }

    // Function to display the form for editing a post
    public function edit($id)
    {
        // Retrieve the post data to be edited
        $post_data = Post::where('id',$id)->first();
        // Return the view for editing the post with the retrieved data
        return view('admin.post_edit', compact('post_data'));
    }

    // Function to update a post
    public function update(Request $request, $id)
    {
        // Retrieve the post data to be updated
        $obj = Post::where('id', $id)->first();

        // Check if a new photo file is uploaded
        if($request->hasFile('photo')) {
            // Validate the incoming request
            $request->validate([
                'photo' => 'image|mimes:jpeg,jpg,svg,png,webp,gif|max:5120',
            ]);

            // Delete the old photo file
            unlink(public_path('uploads/'.$obj->photo));

            // Generate a unique name for the new photo
            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;

            // Move the uploaded photo to the uploads directory
            $request->file('photo')->move(public_path('uploads/'),$final_name);

            // Update the photo file name in the database
            $obj->photo = $final_name;           
        }

        // Update the heading, short content, and content of the post
        $obj->heading = $request->heading;
        $obj->short_content = $request->short_content;
        $obj->content = $request->content;
        $obj->update();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Post is updated successfully!');
        
    }

    // Function to delete a post
    public function delete($id)
    {
        // Retrieve the post data to be deleted
        $single_data = Post::where('id', $id)->first();
        // Delete the photo file from the uploads directory
        // unlink(public_path('uploads/'.$single_data->photo));
        $single_data->remark = 'deleted';
        // Delete the post record from the database
        $single_data->update();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Post is deleted successfully!');
    }
}
