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

    public function follow($id) {

        $course = Course::find($id);

        $course->followers()->attach(auth()->user()->id);

        return redirect("/courses");

    }

    public function unfollow($id) {

        $course = Course::find($id);

        $course->followers()->detach(auth()->user()->id);

        return redirect("/courses");

    }

}
