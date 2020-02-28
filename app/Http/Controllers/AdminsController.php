<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoleUser;
use App\User;
use App\Profile;
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
        $userRoles = DB::table("roles")->get();
        return view("create_user")->with("userRoles", $userRoles);
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

        $user_id = DB::table('users')
        ->select("id")
        ->where("users.email", "=", $request->input("email"))
        ->get();

        // return redirect("/createprofile")->with(['user_id' => $user_id[0]->id]);

        return $this->createProfile($user_id[0]->id);

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
        $educators = DB::table('role_user')
        ->Join('users', 'users.id', '=', 'role_user.user_id')
        ->Join('profiles', "role_user.user_id", "=", "profiles.user_id")
        ->Join("roles", "roles.id", "=", "role_user.role_id")
        ->where("roles.name", "=", "educator")
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

        

        $educator = DB::table('role_user')
        ->Join('users', 'users.id', '=', 'role_user.user_id')
        ->Join('profiles', "role_user.user_id", "=", "profiles.user_id")
        ->Join("roles", "roles.id", "=", "role_user.role_id")
        ->where("roles.name", "=", "educator")
        ->where("role_user.user_id", "=", $id)
        ->get();

        $educator["roles"] = DB::table("roles")->get();

        return view("edit_educator")->with("educator", $educator);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEducator($id)
    {
        
        $user = DB::table('users')
              ->where('id', "=", $id)
              ->update(
                    [
                      'first_name' => request()->first_name,
                      "last_name" => request()->last_name,
                      "password" => request()->password,
                      "email" => request()->email
                    
                    ]
                );

        $profile = DB::table('profiles')
            ->where('user_id', "=", $id)
            ->update(
                    [
                        'age' => request()->age,
                        "linkedin_url" => request()->linkedin_url,
                        "education" => request()->education,
                        "image_url" => request()->image_url,
                        "title" => request()->title,
                        "bio" => request()->bio
                    ]
                );     
        $roles = DB::table('role_user')
            ->Join("roles", "roles.id", "=", "role_user.role_id")
            ->where('user_id', "=", $id)
            ->update(
                    [
                        'role_user.role_id' => request()->user_role
                    ]
                 ); 

        return redirect("/alleducators");               

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEducator($id)
    {   
        DB::table('users')->where('id', '=', $id)->delete();

        return redirect("alleducators");
    }
}
