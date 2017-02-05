<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


 Route::group(['prefix' => 'admin', 'middleware' =>'auth'], function () {

     Route::resource('users', 'UsersController');
        
    });        

Auth::routes();

Route::get('/', 'DashboardController@index');
Route::get('/test', function(){

	$students = App\Student::all();

	return $students;
});


