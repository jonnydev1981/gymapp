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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('workout','WorkoutController');
Route::resource('workoutline','WorkoutLineController');
Route::resource('wod','WodController');
Route::resource('wodline','WodLineController');
Route::resource('exercise','ExerciseController');

Route::get('wod-ajax', 'WorkoutController@dataAjax');
