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
        $this->middleware(['auth', 'auth.super']);
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
        $data = [
            'page' => 'Add User',
            'edit' => false
        ];

        return view('admin.addorEditUser', $data);
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

        // throw error if user don't have a permission


        // create user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('admin-users')->with('status', 'User successfully created!');
    }

    // edit view
    public function editUserView(Request $request, $id)
    {

        // get user
        $user = User::where('id', $id)->first();


        if ($user == null)
            return response('User not found!', 404);


        // return view
        $data = [
            'user' => $user,
            'edit' => true,
            'page' => 'Edit User'
        ];

        return view('admin.addorEditUser', $data);
    }

    public function updateUser(Request $request, $id)
    {


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($id), 'regex:/(.*)deerwalk\.edu\.np$/i'],
            'role' => ['required', 'integer', 'min:1', 'max:5']
        ]);

        // get user
        $user = User::where('id', $id)->first();


        if ($user == null)
            return response('User not found!', 404);


        $user->name = $request->name;
        $user->role = $request->role;

        if ($user->email != $request->email)
            $user->email = $request->email;

        $user->save();


        return redirect()->route('admin-users')->with('status', 'Updated user succesfully!');
    }

    public function deleteUser(Request $request, $id)
    {
        // get user
        $user = User::where('id', $id)->first();

        // do not allow the current user to be deleted
        if ($request->user() == $user)
            return redirect()->route('admin-users')->with('status', 'You cannot delete yourself!');

        if ($user == null)
            return response('User not found!', 404);

        $user->delete();


        return redirect()->route('admin-users')->with('status', 'User deleted successfully!');
    }
}
