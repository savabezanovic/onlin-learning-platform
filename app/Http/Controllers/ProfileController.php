<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Role;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:educator');
        
    }

    public function edit($id)
    {

        $user = User::find($id);

        return view("educator.edit-profile")->with("user", $user);

    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->first_name = $request->input("first_name");
        $user->last_name = $request->input("last_name");
        $user->profile->linkedin_url = $request->input("linkedin_url");
        $user->profile->education = $request->input("education");
        $user->profile->image_url = $request->input("image_url");
        $user->profile->title = $request->input("title");
        $user->profile->bio = $request->input("bio");
        $user->save();
        $user->profile->save();

        return redirect("/");

    }

}
