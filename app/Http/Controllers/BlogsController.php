<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index() {
        $blogs = Post::where('type', 'blog')->get();
        // $featured = Post::where()

        $data = [
            'blogs' => $blogs,
            'featured' => null
        ];



        return view('blogs', $data);
    }
}
