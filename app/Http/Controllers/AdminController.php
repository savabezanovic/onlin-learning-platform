<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\User;
use App\Profile;
use App\Role;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminController extends Controller
{
    use SoftDeletes;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function dashboard()
    {
        return view("admin.dashboard");
    }


    public function createUser()
    {
        $userRoles = Role::all();
        return view("admin.create-user")->with("userRoles", $userRoles);
    }

    public function storeUser(Request $request)
    {
        $user = new User;
        $user->first_name = $request->input("first_name");
        $user->last_name = $request->input("last_name");
        $user->email = $request->input("email");
        $user->password = Hash::make($request->input("password"));
        $user->active = true;
        $user->save();

        $user->roles()->sync([$request->input("user_role")]);
        $user->save();

        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->save();

        return redirect("/admin/dashboard");

    }

    public function showEducators()
    {
        $educators = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['educator']);
        })
            ->withTrashed()
            ->get();

        return view('admin.educators')->with('educators', $educators);
    }

    public function showStudents()
    {
        $students = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['student']);
        })
            ->withTrashed()->get();

        return view('admin.students')->with('students', $students);
    }

    public function showAdmins()
    {

        $admins = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['admin']);
        })
            ->withTrashed()->get();

        return view('admin.admins')->with('admins', $admins);

    }

    public function showCourses()
    {

        $courses = Course::withTrashed()->get();

        return view('admin.courses')->with('courses', $courses);

    }

    public function edit($slug)
    {

        $user = User::where("slug", "=", $slug)->first();
        $roles = Role::all();

        return view("admin.edit")->with("user", $user)->with("roles", $roles);
    }

    public function update(Request $request, $slug)
    {

        $user = User::where("slug", "=", $slug)->first();
        $user->first_name = $request->input("first_name");
        $user->last_name = $request->input("last_name");
        $user->email = $request->input("email");
        $user->password = $request->input("password");
        $user->profile->age = $request->input("age");
        $user->profile->linkedin_url = $request->input("linkedin_url");
        $user->profile->education = $request->input("education");
        $user->profile->image_url = $request->input("image_url");
        $user->profile->title = $request->input("title");
        $user->profile->bio = $request->input("bio");
        $user->roles()->sync([$request->input("user_role")]);
        $user->save();
        $user->profile->save();

        return redirect("/admin/dashboard");

    }

    public function restrictUser($slug)
    {
        $user = User::where("slug", "=", $slug)->first();

        $user->delete();

        return redirect("/admin/dashboard");

    }

    public function restoreUser($slug)
    {

        $user = User::withTrashed()->where("slug", "=", $slug)->first();

        $user->restore();

        return redirect("/admin/dashboard");

    }

    public function deleteUser($slug)
    {

        $user = User::where("slug", "=", $slug)->first();

        $user->forceDelete();

        return redirect("/admin/dashboard");

    }

    public function restrictCourse($slug)
    {
        $course = Course::where("slug", "=", $slug)->first();

        $course->delete();

        return redirect("/admin/courses");

    }

    public function restoreCourse($slug)
    {

        $course = Course::withTrashed()->where("slug", "=", $slug)->first();

        $course->restore();

        return redirect("/admin/courses");

    }

    public function deleteCourse($slug)
    {

        $course = Course::where("slug", "=", $slug);

        $course->forceDelete();

        return redirect("/admin/courses");

    }

    public function activateUser($slug)
    {

        $user = User::where("slug", "=", $slug)->first();

        $user->active = true;

        $user->save();

        return redirect("/admin/dashboard");

    }

    public function deactivateUser($slug)
    {

        $user = User::where("slug", "=", $slug)->first();

        $user->active = false;

        $user->save();

        return redirect("/admin/dashboard");

    }

    public function activateCourse($slug)
    {

        $course = Course::where("slug", "=", $slug)->first();

        $course->active = true;

        $course->save();

        return redirect("/admin/courses");

    }

    public function deactivateCourse($slug)
    {

        $course = Course::where("slug", "=", $slug)->first();

        $course->active = false;

        $course->save();

        return redirect("/admin/courses");

    }

}
