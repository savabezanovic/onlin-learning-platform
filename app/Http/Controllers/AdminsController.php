<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoleUser;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showEducators()
    {
        $educators = DB::table('role_users')
        ->leftJoin('users', 'users.id', '=', 'role_users.user_id')
        ->leftJoin('profiles', "role_users.user_id", "=", "profiles.user_id")
        ->leftJoin("roles", "roles.id", "=", "role_users.role_id")
        ->where("roles.name", "=", "educator")
        ->get();

        return view('all_educators')->with('educators', $educators);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editEducator()
    {
        return view("edit_educator");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
