<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // redirect to pending post view
        return redirect()->route('user.posts.pending');
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [
            'edit' => false
        ];

        return view('user.writePost', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        return redirect(route('user.posts.pending'))->with('status', 'Your blog has been posted for review.');
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
        return redirect()->route('blogs.show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = auth()->user()->posts->where('id', $id)->first();

        if ($post == null)
            return abort(404);

        $data = [
            'edit' => true,
            'post' => $post
        ];

        return view('user.writePost', $data);
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
        //
        $this->validatePost($request);

        $post = auth()->user()->posts->where('id', $id)->first();

        if ($post == null)
            return abort(404);

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

        return redirect(route('user.posts.pending'))->with('status', 'Your post has been edited successfully and moved to pending for review!');
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
        $post = auth()->user()->posts->where('id', $id)->first();

        if ($post == null)
            return abort(404);

        // delete
        $post->delete();

        return back()->with('status', 'Post Deleted Successfully');
    }
}
