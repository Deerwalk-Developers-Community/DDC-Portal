<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return view('admin.posts');
    }

    // add post page
    public function addPost() {
        return view('admin.addPost');
    }
}
