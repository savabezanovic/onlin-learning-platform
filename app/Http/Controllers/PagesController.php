<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $courses = DB::table('course_users')
        ->select(DB::raw('count(course_users.user_id) as qty, courses.name, courses.video_url'))
        ->join("courses", "courses.id", "=", "course_users.course_id")
        ->groupBy('courses.name')
        ->groupBy('courses.video_url')
        ->orderBy('qty', 'DESC')
        ->take(3)
        ->get();

        return view("home")->with("courses", $courses);
    }

    public function showAllEducators() 
    {

        $recentJoins = DB::table('role_users')
        ->Join('users', 'users.id', '=', 'role_users.user_id')
        ->Join('profiles', "role_users.user_id", "=", "profiles.user_id")
        ->Join("roles", "roles.id", "=", "role_users.role_id")
        ->where("roles.name", "=", "educator")
        ->orderBy("users.created_at")
        ->take(3)
        ->get();

        $searchEducators = DB::table('role_users')
        ->Join('users', 'users.id', '=', 'role_users.user_id')
        ->Join('profiles', "role_users.user_id", "=", "profiles.user_id")
        ->Join("roles", "roles.id", "=", "role_users.role_id")
        ->where("roles.name", "=", "educator")
        ->get();

        return view('show_all_educators')->with('recentJoins', $recentJoins)->with("searchEducators", $searchEducators);

    }

    public function showAllCourses()
    {

        $recentCreatons = DB::table('courses')
        ->orderBy("created_at")
        ->take(3)
        ->get();

        return view("show_all_courses")->with("recentCreatons", $recentCreatons);

    }

}
