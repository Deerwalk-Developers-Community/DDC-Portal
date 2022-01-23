<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    // list user view
    public function index()
    {
        $users = User::all();

        $data = [
            'users' => $users
        ];
        return view('admin.users', $data);
    }


    // add user form view
    public function addUser(Request $request)
    {


        return view('admin.addUser');
    }


    // Creating user from post request
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/(.*)deerwalk\.edu\.np$/i'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'integer', 'min:1', 'max:5']
        ]);

        // 
        // todo: check if current user role is 1 or 2


        // create user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
    }
}
