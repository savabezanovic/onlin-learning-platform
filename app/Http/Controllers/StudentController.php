<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('role:student');
        
    }

    public function follow($slug) {

        $course = Course::where("slug", "=", $slug);

        $course->followers()->attach(auth()->user()->id);

        return redirect("/courses");

    }

    public function unfollow($slug) {

        $course = Course::where("slug", "=", $slug);

        $course->followers()->detach(auth()->user()->id);

        return redirect("/courses");

    }

}
