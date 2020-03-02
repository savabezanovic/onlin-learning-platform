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
Route::get("/educators", "PagesController@showAllEducators");
Route::get("/courses", "PagesController@showAllCourses");

Route::get('/admin', 'AdminsController@index');
Route::get('/admin/educators', 'AdminsController@showEducatorsAdmin');

Route::get('/admin/edit/{user_id}', 'AdminsController@editEducator');
Route::put('admin/update/{user_id}', 'AdminsController@updateEducator');
Route::delete('admin/delete/{user_id}', 'AdminsController@deleteEducator');

Route::get("admin/create", "AdminsController@createUser");
Route::post("admin/save", "AdminsController@storeUser");

Route::get("admin/profile", "AdminsController@createProfile");
Route::post("admin/saveProfile/{user_id}", "AdminsController@saveProfile");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
