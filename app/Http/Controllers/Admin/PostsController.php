<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $posts = Post::where('deleted', false)->get();

        $data = [
            'posts' => $posts
        ];

        return view('admin.posts', $data);
    }

    // add post page
    public function addPost()
    {
        return view('admin.addPost');
    }

    // store post in db
    public function storePost(Request $request)
    {


        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'mimes:jpg,jpeg,png|nullable',
            'github' => 'url|nullable',
            'link' => 'url|nullable',
            'type' => 'required|in:blog,event,live-stream,project',
        ]);


        if ($request->hasFile('image')) {

            $image_name = $request->image->store("public/images");
            $image_name = explode("/", $image_name)[2];
        }

        $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'github' => $request->github,
            'link' => $request->link,
            'type' => $request->type
        ]);

        return redirect(route('admin-posts'));
    }
}
