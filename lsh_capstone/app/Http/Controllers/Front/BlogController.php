<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Function to display the blog page with paginated posts
    public function index()
    {
        // Retrieve all posts ordered by id in descending order and paginate them (9 posts per page)
        $post_all = Post::where('remark', 'active')->orderBy('id', 'desc')->paginate(9);

        // Return the view 'front.blog' with the paginated posts
        return view('front.blog', compact('post_all'));
    }

    // Function to display a single post and update its view count
    public function single_post($id)
    {
        // Retrieve the single post data based on the id
        $single_post_data = Post::where('id', $id)->first();

        // Increase the total view count of the post by 1
        $single_post_data->total_view = $single_post_data->total_view + 1;

        // Update the post's total view count in the database
        $single_post_data->update();

        // Return the view 'front.post' with the single post data
        return view('front.post', compact('single_post_data'));
    }
}
