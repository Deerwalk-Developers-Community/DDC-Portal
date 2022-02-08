<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{


    private function validatePost(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'mimes:jpg,jpeg,png|nullable',
            'github' => 'url|nullable',
            'link' => 'url|nullable',
            'type' => 'required|in:blog,event,live-stream,project',
        ]);
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
        $data = [
            'page' => 'Add Post',
            'edit' => false
        ];


        return view('admin.addorEditPost', $data);
    }

    // store post in db
    public function storePost(Request $request)
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
            'github' => $request->github,
            'link' => $request->link,
            'type' => $request->type,
            'tags' => $request->tags
        ]);

        return redirect(route('admin.posts'));
    }

    private function checkPostPermission($user, $post)
    {
        if ($user->role != 1 && $user != $post->user)
            return response('Unauthorized', 403);
    }

    // edit post view
    public function editPostView(Request $request, $id)
    {

        // find post
        $post = Post::where('id', $id)->first();

        if ($post == null)
            return response('Not Found', 404);


        // check user permisison
        $this->checkPostPermission($request->user(), $post);

        // load edit view
        $data = [
            'post' => $post,
            'page' => 'Edit Post',
            'edit' => true
        ];

        return view('admin.addorEditPost', $data);
    }

    public function editPost(Request $request, $id)
    {

        // find post
        $post = Post::where('id', $id)->first();

        if ($post == null)
            return response('Not Found', 404);



        // check user permisison
        $this->checkPostPermission($request->user(), $post);

        $this->validatePost($request);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->github = $request->github;
        $post->link = $request->link;
        $post->type = $request->type;
        $post->tags = $request->tags;

        if ($request->hasFile('image')) {
            $prev_image = $post->image;

            if ($prev_image != null)
                Storage::unlink('public/images/' . $prev_image);



            $image_name = $request->image->store("public/images");
            $image_name = explode("/", $image_name)[2];

            $post->image = $image_name;
        }

        $post->save();

        return redirect(route('admin.posts'));
    }


    // delete post
    public function deletePost(Request $request, $id)
    {

        // find post
        $post = Post::where('id', $id)->first();

        // check permission
        $this->checkPostPermission($request->user(), $post);

        if ($post == null)
            return back()->with('status', 'Post not found!');


        // delete
        $post->delete();

        return back()->with('status', 'Post Deleted Successfully');
    }


    // publish or unpublish a post
    public function publishPost(Request $request, $id, $publish)
    {

        // find post
        $post = Post::where('id', $id)->first();

        // check permission
        $this->checkPostPermission($request->user(), $post);

        if ($post == null)
            return back()->with('status', 'Post not found!');

        if ($publish == "publish") {
            $post->published = true;
            $post->save();
            return back()->with('status', 'Post has been pubilshed!');
        } else if ($publish == "unpublish") {
            $post->published = false;
            $post->save();
            return back()->with('status', 'Post has been unpublished!');
        }

        return back();
    }
}
