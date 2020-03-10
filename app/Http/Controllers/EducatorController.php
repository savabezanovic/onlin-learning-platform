<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Course;

class EducatorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:educator');
    }

    public function edit($id)
    {
        
        $course = Course::find($id);

        $categories = Category::all();

        return view("educator.edit-course")->with("course", $course)->with("categories", $categories);

    }

    public function update(Request $request, $id)
    {

        $course = Course::find($id);
        $course->name = $request->input("name");
        $course->description = $request->input("description");
        $course->goals = $request->input("goals");
        $course->category_id = $request->input("category");
        $course->video_url = $request->input("video_url");
        $course->user_id = $request->input("user_id");
        $course->image_url = $request->input("image_url");
        $course->save();

        return redirect("/");

    }

    public function create()
    {
        
        $categories = Category::all();

        return view("educator.create-course")->with("categories", $categories);

    }

    public function save(Request $request)
    {

        $course = new Course();
        $course->name = $request->input("name");
        $course->description = $request->input("description");
        $course->goals = $request->input("goals");
        $course->category_id = $request->input("category");
        $course->video_url = $request->input("video_url");
        $course->user_id = $request->input("user_id");
        $course->image_url = $request->input("image_url");
        $course->save();

        return redirect("/");

    }

    public function delete($id)
    {

        $course = Course::find($id);
        $course->delete();

        return redirect("/");

    }

}