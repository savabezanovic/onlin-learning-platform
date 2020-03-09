<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducatorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:educator');
    }

    public function edit($course_name)
    {
        dd($course_name);
        return redirect("/")

    }

}