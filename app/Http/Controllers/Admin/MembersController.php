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
        $this->middleware(['auth', 'auth.super']);
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
            "page" => "Add Executive Member",
            "edit" => false
        ];

        return view('admin.addorEditMember', $data = $context);
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

        return redirect()->route('admin-members')->with('status', 'Member Added Successfully!');
    }

    public function editExecutiveView(Request $request, $id) {
        $member = Member::where('id', $id)->first();


        if ($member == null)
            return response('Not found', 404);

        $data = [
            'edit' => true,
            'page' => "Edit Executive Member",
            'member' => $member
        ];

        return view('admin.addorEditMember', $data);

    }

    public function updateExecutive(Request $request, $id)
    {
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png',
            'name' => 'required',
            'github' => 'required|max:255',
            'linkedin' => 'required|max:255'
        ]);

        $member = Member::where('id', $id)->first();


        if ($member == null)
            return response('Not found', 404);


        if ($request->hasFile('image')) {
            $prev_image = $member->image;

            Storage::unlink('public/images/' . $prev_image);

            $image_name = time() . "-" . $request->name . "." . $request->image->extension();

            $request->image->storeAs("public/images", $image_name);

            $member->image = $image_name;
        }

        $member->name = $request->name;
        $member->github = $request->github;
        $member->linkedin = $request->linkedin;

        $member->save();

        return redirect()->route('admin-members')->with('status', 'Updated member successfully!');
    }


    // delete executive
    public function deleteExecutive(Request $request, $id) {
        $member = Member::where('id', $id)->first();


        if ($member == null) 
            return response('Not found', 404);

        $member->delete();

        
        return redirect()->route('admin-members')->with('status', 'Deleted member successfully!');
    }
}
