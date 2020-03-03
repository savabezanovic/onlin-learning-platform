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
    public function index()
    {
        return view("admin");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser()
    {
        $userRoles = Role::all();
        return view("create_user_admin")->with("userRoles", $userRoles);
    }

    public function createProfile($id) 
    {
        $user_id = $id;

        return view("create_profile")->with("user_id", $user_id);
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

        // $user_id = DB::table('users')
        // ->select("id")
        // ->where("users.email", "=", $request->input("email"))
        // ->get();

        // return redirect("/createprofile")->with(['user_id' => $user_id[0]->id]);

        return $this->createProfile($user_id->id);

    }

    public function storeProfile(Request $request, $id) 
    {

        $profile = new Profile;
        $profile->age = $request->input("age");
        $profile->linkedin_url = $request->input("linkedin_url");
        $profile->education = $request->input("education");
        $profile->image_url = $request->input("image_url");
        $profile->title = $request->input("title");
        $profile->bio = $request->input("bio");
        $profile->user_id = $id;
        $profile->save();

        return redirect("/createuser");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showEducatorsAdmin()
    {
        $educators = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['educator']);
        })
        ->get();

        return view('show_all_educators_admin')->with('educators', $educators);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editEducator($id)
    {

        $educator = User::find($id);
        $roles = Role::all();

        return view("edit_educator_admin")->with("educator", $educator)->with("roles", $roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEducator(Request $request, $id)
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
        $user->roles()->sync([$request->user_role]);
        $user->save();

        return redirect("/admin/educators");               

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEducator($id)
    {   
        $user = User::find($id);
        
        $user->delete();

        return redirect("/admin/educators");

    }
}
