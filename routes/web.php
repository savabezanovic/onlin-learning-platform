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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/", "PagesController@index");
Route::get('/admin', 'AdminsController@index');
Route::get('/alleducators', 'AdminsController@showEducators');
Route::get('/editeducator/{user_id}', 'AdminsController@editEducator');

Route::put('/updateeducator/{user_id}', 'AdminsController@updateEducator');
Route::delete('/deleteeducator/{user_id}', 'AdminsController@deleteEducator');

Route::get("/createuser", "AdminsController@createUser");
Route::post("/storeuser", "AdminsController@storeUser");

Route::get("/createprofile", "AdminsController@createProfile");

Route::post("/storeprofile/{user_id}", "AdminsController@storeProfile");