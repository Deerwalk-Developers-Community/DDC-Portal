<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    //
    public function index()
    {
        $data = [
            'members' => Member::all()
        ];
        return view('aboutus', $data);
    }
}
