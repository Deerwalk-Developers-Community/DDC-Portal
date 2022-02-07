<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'auth.memberonly']);
    }

    public function index(Request $request){
        return view('user.notifications');
    }
}
