<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\map;

class MembersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }


    // list executive members
    public function index()
    {
        $executive_members = Member::where('role', 'executive-member')->get();

        $data = [
            'executive_members' => $executive_members
        ];

        // dd(Storage::url("images/" . $executive_members[0]->image));

        return view('admin.members', $data);
    }


    // Add executive member
    public function addExecutive()
    {
        $context = [
            "title" => "Add Executive Member"
        ];

        return view('admin.addoreditMember', $data = $context);
    }

    // store executive member
    public function storeExecutive(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png',
            'name' => 'required',
            'github' => 'required|max:255',
            'linkedin' => 'required|max:255'
        ]);

        $image_name = '';

        
        if ($request->hasFile('image')) {
            $image_name = time() . "-" . $request->name . "." . $request->image->extension();
            
            $request->image->storeAs("public/images", $image_name);
        }

        Member::create([
            'image' => $image_name,
            'name' => $request->name,
            'github' => $request->github,
            'linkedin' => $request->linkedin
        ]);

        return redirect(route('admin-members'));
    }
}
