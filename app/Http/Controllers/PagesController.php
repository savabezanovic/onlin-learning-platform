<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\Course;
use App\User;
use App\Role;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homePage()
    {
        
        // $courses = DB::table('course_user')
        // ->select(DB::raw('count(course_user.user_id) as qty, courses.name, courses.video_url'))
        // ->join("courses", "courses.id", "=", "course_user.course_id")
        // ->groupBy('courses.name')
        // ->groupBy('courses.video_url')
        // ->orderBy('qty', 'DESC')
        // ->take(3)
        // ->get();

        // $courses = Course::get();
       
        // return view("home")->with("courses", $courses);

        $user = User::find(1);

        return view("home")->with("user", $user);
    }

    public function showAllEducators() 
    {

        $recentJoins = DB::table('role_user')
        ->Join('users', 'users.id', '=', 'role_user.user_id')
        ->Join('profiles', "role_user.user_id", "=", "profiles.user_id")
        ->Join("roles", "roles.id", "=", "role_user.role_id")
        ->where("roles.name", "=", "educator")
        ->orderBy("users.created_at")
        ->take(3)
        ->get();

        $searchEducators = DB::table('role_user')
        ->Join('users', 'users.id', '=', 'role_user.user_id')
        ->Join('profiles', "role_user.user_id", "=", "profiles.user_id")
        ->Join("roles", "roles.id", "=", "role_user.role_id")
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
