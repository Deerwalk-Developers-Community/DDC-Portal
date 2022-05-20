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

    private function checkPostPermission($user, $post)
    {
        if ($user->role != 1 && $user != $post->user)
            return response('Unauthorized', 403);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('deleted', false)->get();

        $data = [
            'posts' => $posts
        ];

        return view('admin.posts', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'page' => 'Add Post',
            'edit' => false
        ];


        return view('admin.addorEditPost', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validatePost($request);

        $image_name = null;

        // check and store image
        if ($request->hasFile('image')) {
            $image_name = $request->image->store("images");
            $image_name = explode("/", $image_name)[1];
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

        return redirect(route('admin.posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find post
        $post = Post::where('id', $id)->first();

        if ($post == null)
            return response('Not Found', 404);


        // check user permisison
        $this->checkPostPermission(auth()->user(), $post);

        // load edit view
        $data = [
            'post' => $post,
            'page' => 'Edit Post',
            'edit' => true
        ];

        return view('admin.addorEditPost', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // find post
        $post = Post::where('id', $id)->first();

        if ($post == null)
            return response('Not Found', 404);



        // check user permisison
        $this->checkPostPermission(auth()->user(), $post);

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
                Storage::delete('images/' . $prev_image);



            $image_name = $request->image->store("images");
            $image_name = explode("/", $image_name)[1];

            $post->image = $image_name;
        }

        $post->save();

        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find post
        $post = Post::where('id', $id)->first();

        // check permission
        $this->checkPostPermission(auth()->user(), $post);

        if ($post == null)
            return back()->with('status', 'Post not found!');


        // delete
        $post->delete();

        return back()->with('status', 'Post Deleted Successfully');
    }

    // publish or unpublish a post
    public function publish(Request $request, $id, $publish)
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
