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

        $educator = User::find($id);

        return view("educator.edit")->with("educator", $educator);

    }

    public function update(Request $request, $id)
    {

        $educator = User::find($id);
        $educator->first_name = $request->input("first_name");
        $educator->last_name = $request->input("last_name");
        $educator->profile->age = $request->input("age");
        $educator->profile->linkedin_url = $request->input("linkedin_url");
        $educator->profile->education = $request->input("education");
        $educator->profile->image_url = $request->input("image_url");
        $educator->profile->title = $request->input("title");
        $educator->profile->bio = $request->input("bio");
        $educator->save();
        $educator->profile->save();

        return redirect("/");               

    }

}
