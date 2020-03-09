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

Route::get("/", "PageController@homePage");
Route::get("/educators", "PageController@showEducators");
Route::get("/educators/{id}/profile", "PageController@showEducator");
Route::get("/educators/{id}/courses", "PageController@myCourses");

Route::get("/courses", "PageController@showCourses");
Route::get("/courses/category/{category_name}", "PageController@showCategoryCourses");

Route::get("/course/{course_name}", "PageController@showCourse");

Route::put("/course/{course_name}/edit", "EducatorController@edit");

Route::get("/educators/{id}/profile/edit", "ProfileController@edit");
Route::put('/educators/profile/update/{educator_id}', 'ProfileController@update');

Route::get('/admin/dashboard', 'AdminController@dashboard');
Route::get('/admin/educators', 'AdminController@showEducators');
Route::get("/admin/students", "AdminController@showStudents");

Route::get('/admin/edit/{user_id}', 'AdminController@edit');
Route::put('/admin/update/{user_id}', 'AdminController@update');
Route::delete('/admin/delete/{user_id}', 'AdminController@delete');

Route::get("/admin/create", "AdminController@createUser");
Route::post("admin/save", "AdminController@storeUser");

Route::get("/register/{role}", "Auth\RegisterController@showRegistrationForm");
Route::post("/register/user", "Auth\RegisterController@create");

Auth::routes();