<?php

namespace App\Http\Controllers;

use App\Models\FeaturedBlog;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index() {
        $featured = FeaturedBlog::all()->first();
        $blogs = Post::where('type', 'blog')->where('published', true)->where('id', '!=', $featured->post->id)->orderBy('created_at', 'desc')->get();
        $data = [
            'blogs' => $blogs,
            'featured' => $featured->post
        ];



        return view('blogs', $data);
    }


    public function blogDetailView(Request $request, $id) {
        $blog = Post::where('type', 'blog')->where('published', true)->where('id', $id)->first();

        if ($blog == null)
            return abort(404);

        $data = [
            'blog' => $blog
        ];

        return view('blogDetail', $data);
    }
}
