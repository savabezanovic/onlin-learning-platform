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

Route::get("/", "PagesController@homePage");
Route::get("/educators", "PagesController@showEducators");
Route::get("/courses", "PagesController@showCourses");

Route::get('/admin/dashboard', 'AdminsController@dashboard');
Route::get('/admin/educators', 'AdminsController@showEducators');
Route::get("/admin/students", "AdminsController@showStudents");

Route::get('/admin/edit/{user_id}', 'AdminsController@edit');
Route::put('/admin/update/{user_id}', 'AdminsController@update');
Route::delete('/admin/delete/{user_id}', 'AdminsController@delete');

Route::get("/admin/create", "AdminsController@createUser");
Route::post("admin/save", "AdminsController@storeUser");

Route::post("/register/user", "Auth\RegisterController@create");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
