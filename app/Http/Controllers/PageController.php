<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Course;
use App\User;
use App\Category;

class PageController extends Controller
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

    public function showEducator($id)
    {
    
        $educator = User::find($id);

        $courses = Course::where("user_id", "=", $id)->get();

        return view("educator")->with("educator", $educator)->with("courses", $courses);

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

    public function showCourse($id)
    {

        $course = Course::find($id);
    
        $goals = explode(",", $course->goals);

        $recommended = Course::where("user_id", "=", $course->user_id)->whereNotIn('id', [$id])->take(3)->get();

        return view("course")->with("course", $course)->with("goals", $goals)->with("recommended", $recommended);

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

    public function myCourses($id)
    {

        $createdCourses = Course::where("user_id", "=", $id)->get();
        
        $allCourses = Course::whereHas('students', function (Builder $query) use ($id) {
            $query->where('users.id', '=', $id);
        })->get();

        return view("my-courses")->with("createdCourses", $createdCourses)
        ->with("allCourses", $allCourses);
    
    }

}