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
        
        $courses = Course::with('students')
            ->withCount('students')
            ->latest('students_count')
            ->take(3)
            ->get();

        return view("home")->with("courses", $courses);
    }

    public function showEducators(Request $request)
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
            $wheres->where('first_name', 'like', "%" . $name . '%')
                   ->orWhere('last_name', 'like', "%" . $name . '%');
            });
        })
            ->get();

        return view('educators')->with('recentEducators', $recentEducators)->with("allEducators", $allEducators);

    }

    public function showCourses()
    {

        $recentCourses = Course::latest("created_at")
        ->take(3)
        ->get();

        $categories = Category::all();

        $courses = Course::all();

        return view("courses")->with("recentCourses", $recentCourses)->with("categories", $categories)->with("courses", $courses);

    }

    public function showCategoryCourses($category_name)
    {
        
        $category = Category::where("name", "=", $category_name)->first();
    
        $recentCourses = Course::where("category_id", "=", $category->id)
        ->latest("created_at")
        ->take(3)
        ->get();

        $categories = Category::all();

        $courses = Course::where("category_id", "=", $category->id)->get();

        return view("courses")->with("recentCourses", $recentCourses)->with("categories", $categories)->with("courses", $courses);

    }

    public function showCourse($course_name)
    {

        $course = Course::where("name", "=", $course_name)->first();

        $goals = explode(",", $course->goals);

        return view("course")->with("course", $course)
        ->with("goals", $goals)
        ->with("recommended", $recommended);
    }

}
