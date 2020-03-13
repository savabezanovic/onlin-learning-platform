<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin/educators', 'AdminController@showEducators');
    Route::get("/admin/students", "AdminController@showStudents");
    Route::get("/admin/admins", "AdminController@showAdmins");
    Route::get("/admin/courses", "AdminController@showCourses");

    Route::get('/admin/edit/{slug}', 'AdminController@edit');
    Route::put('/admin/update/{slug}', 'AdminController@update');

    Route::delete('/admin/restrict/user/{slug}', 'AdminController@restrictUser');
    Route::get('/admin/restore/user/{slug}', 'AdminController@restoreUser');
    Route::delete('/admin/delete/user/{slug}', 'AdminController@deleteUser');

    Route::delete('/admin/restrict/course/{slug}', 'AdminController@restrictCourse');
    Route::get('/admin/restore/course/{slug}', 'AdminController@restoreCourse');
    Route::delete('/admin/delete/course/{slug}', 'AdminController@deleteCourse');

    Route::post('/admin/activate/user/{slug}', 'AdminController@activateUser');
    Route::post('/admin/deactivate/user/{slug}', 'AdminController@deactivateUser');

    Route::post('/admin/activate/course/{slug}', 'AdminController@activateCourse');
    Route::post('/admin/deactivate/course/{slug}', 'AdminController@deactivateCourse');

    Route::get("/admin/create", "AdminController@createUser");
    Route::post("admin/save", "AdminController@storeUser");
});

Route::middleware(['role:student'])->group(function () {
    Route::post("/course/follow/{slug}", "StudentController@follow");
    Route::delete("/course/unfollow/{slug}", "StudentController@unfollow");
});

Route::middleware(['role:educator'])->group(function () {
    Route::get("/course/create", "EducatorController@create");
    Route::post("/course/save", "EducatorController@save");
    Route::get("/course/edit/{slug}", "EducatorController@edit");
    Route::put("/course/update/{slug}", "EducatorController@update");
    Route::delete("/course/delete/{slug}", "EducatorController@delete");

    Route::get("/profile/edit/{slug}", "ProfileController@edit");
    Route::put('/profile/update/{slug}', 'ProfileController@update');
});

Route::get("/", "PageController@homePage");
Route::get("/educators", "PageController@showEducators");
Route::get("/profile/{slug}", "PageController@showEducator");
Route::get("/mycourses", "PageController@myCourses");

Route::get("/courses", "PageController@showCourses");
Route::get("/courses/category/{category_name}", "PageController@showCategoryCourses");
Route::get("/course/{slug}", "PageController@showCourse");

Route::get("/register/{role}", "Auth\RegisterController@showRegistrationForm");
Route::post("/register/user", "Auth\RegisterController@create");

Auth::routes();
