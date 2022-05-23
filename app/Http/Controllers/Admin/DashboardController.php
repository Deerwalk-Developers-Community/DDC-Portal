<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeaturedBlog;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    //
    public function index()
    {
        $posts = Post::where('deleted', false)->where('published', true)->where('type', 'blog')->get();
        $featuredBlog = FeaturedBlog::all()->first();

        $data = [
            'posts' => $posts,
            'featured' => $featuredBlog != null ? $featuredBlog->post : null
        ];

        return view('admin.dashboard', $data);
    }

    public function storeFeaturedPost(Request $request)
    {
        $post = null;

        if ($request->featured != null) {
            $post = Post::where('id', $request->featured)->first();
        }


        $blog = FeaturedBlog::first();
        if ($blog != null)
            $blog->delete();

        if ($post != null) {
            $featured = new FeaturedBlog();
            $post->featured()->save($featured);
        }
        return back()->with('status', 'Changed Featured Post!');
    }
}
