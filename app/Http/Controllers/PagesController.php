<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use DB;
use App\Course;
use App\User;
use App\Role;
use App\Category;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homePage()
    {
        
        $courses = Course::with('users')
            ->withCount('users')
            ->latest('users_count')
            ->take(3)
            ->get();

        return view("home")->with("courses", $courses);
    }

    public function showAllEducators(Request $request)
    {
    
        $name = $request->get('name');

        $recentEducators = User::whereHas('roles', function (Builder $query)  {
            $query->where('roles.name', '=', 'educator');
        })
        ->latest("created_at")
        ->take(3)
        ->get();

        $allEducators = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['educator']);
        })
            ->where( function ($query) use ($name){
            $query->where(function ($wheres) use ($name) {
            $wheres->where('first_name', 'like', $name . '%')
                   ->orWhere('last_name', 'like', $name . '%');
            });
        })
            ->get();

        return view('show_all_educators')->with('recentEducators', $recentEducators)->with("allEducators", $allEducators);

    }

    public function showAllCourses($name = "" )
    {

        $recentCourses = Course::latest("created_at")
        ->take(3)
        ->get();

        $categories = Category::all();

        $courses = Course::all();

        return view("show_all_courses")->with("recentCourses", $recentCourses)->with("categories", $categories)->with("courses", $courses);

    }

}
