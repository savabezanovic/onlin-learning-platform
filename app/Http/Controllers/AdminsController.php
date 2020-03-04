<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoleUser;
use App\User;
use App\Profile;
use App\Role;
use DB;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view("admin.dashboard");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser()
    {
        $userRoles = Role::all();
        return view("admin.create_user")->with("userRoles", $userRoles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(Request $request)
    {
        $user = new User;
        $user->first_name = $request->input("first_name");
        $user->last_name = $request->input("last_name");
        $user->email = $request->input("email");
        $user->password = $request->input("password");
        $user->save();

        $user->roles()->sync([$request->input("user_role")]);
        $user->save();

        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->save();
      
        return redirect("/admin/dashboard");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showEducators()
    {
        $educators = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['educator']);
        })
        ->get();

        return view('admin.educators')->with('educators', $educators);
    }

    public function showStudents()
    {
        $students = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['student']);
        })
        ->get();

        return view('admin.students')->with('students', $students);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        $roles = Role::all();

        return view("admin.edit")->with("user", $user)->with("roles", $roles);
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

        $user = User::find($id);
        $user->first_name = $request->input("first_name");
        $user->last_name = $request->input("last_name");
        $user->email = $request->input("email");
        $user->password = $request->input("password");
        $user->profile->age = $request->input("age");
        $user->profile->linkedin_url = $request->input("linkedin_url");
        $user->profile->education = $request->input("education");
        $user->profile->image_url = $request->input("image_url");
        $user->profile->title = $request->input("title");
        $user->profile->bio = $request->input("bio");
        $user->roles()->sync([$request->input("user_role")]);
        $user->save();
        $user->profile->save();

        return redirect("/admin/dashboard");               

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {   
        $user = User::find($id);
        
        $user->delete();

        return redirect("/admin/dashboard");

    }
}
