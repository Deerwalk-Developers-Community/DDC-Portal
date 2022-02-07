<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'auth.memberonly']);
    }


    private function validatePost(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'mimes:jpg,jpeg,png|nullable',
        ]);
    }


    public function pendingPostView(Request $request)
    {
        $posts = $request->user()->posts->where('published', false);

        $data = [
            'posts' => $posts,
            'page' => 'pending'
        ];

        return view('user.posts', $data);
    }

    public function publishedPostView(Request $request)
    {
        $posts = $request->user()->posts->where('published', true);

        $data = [
            'posts' => $posts,
            'page' => 'published'
        ];

        return view('user.posts', $data);
    }


    // Create post
    public function createPostView()
    {
        $data = [
            'edit' => false
        ];

        return view('user.writePost', $data);
    }


    public function createPost(Request $request)
    {
        $this->validatePost($request);

        $image_name = null;

        // check and store image
        if ($request->hasFile('image')) {

            $image_name = $request->image->store("public/images");
            $image_name = explode("/", $image_name)[2];
        }


        $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image_name,
            'type' => 'blog',
            'tags' => $request->tags,
        ]);

        return redirect(route('user-posts-pending'))->with('status', 'Your blog has been posted for review.');
    }


    // Edit post
    public function editPostView(Request $request, $id)
    {
        $post = $request->user()->posts->where('id', $id)->first();

        if ($post == null)
            response('Not found', 404);

        $data = [
            'edit' => true,
            'post' => $post
        ];

        return view('user.writePost', $data);
    }

    public function editPost(Request $request, $id)
    {

        $this->validatePost($request);

        $post = $request->user()->posts->where('id', $id)->first();

        if ($post == null)
            response('Not found', 404);

        $post->title = $request->title;
        $post->content = $request->content;

        $post->tags = $request->tags;
        $post->published = false;


        if ($request->hasFile('image')) {
            $prev_image = $post->image;

            if ($prev_image != null)
                Storage::unlink('public/images/' . $prev_image);

            $image_name = $request->image->store("public/images");
            $image_name = explode("/", $image_name)[2];

            $post->image = $image_name;
        }

        $post->save();

        return redirect(route('user-posts-pending'))->with('status', 'Your post has been edited successfully and moved to pending for review!');
    }


    // delete post
    public function deletePost(Request $request, $id)
    {

        // find post
        $post = $request->user()->posts->where('id', $id)->first();

        if ($post == null)
            return back()->with('status', 'Post not found!');

        // delete
        $post->delete();

        return back()->with('status', 'Post Deleted Successfully');
    }
}
