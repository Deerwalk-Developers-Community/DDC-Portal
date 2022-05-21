<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index(Request $request) {

        $events = Post::where('type', 'event')->where('published', true)->orderBy('created_at', 'desc')->get();

        $data = [
            'events' => $events
        ];


        return view('event', $data);
    }

    public function show(Request $request, $id) {

        $event = Post::where('type', 'event')->where('published', true)->where('id', $id)->first();

        if ($event == null)
            return abort(404);

        
        $data = [
            'blog' => $event
        ];

        return view('blogDetail', $data);

    }
}
