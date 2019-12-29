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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('workout','WorkoutController');
Route::resource('workoutline','WorkoutLineController');
Route::resource('exercise','ExerciseController');
Route::resource('statistic','StatisticController');

Route::get('wod-ajax', 'WorkoutController@dataAjax');

Route::get('/', 'DashboardController@index')->name('dashboard');


// Box owner only routes
Route::group(['middleware' => 'App\Http\Middleware\BoxMiddleware'], function()
{
    Route::resource('wod','WodController');
    Route::resource('wodline','WodLineController');
});

// Error definitions
Route::get('errors/boxowner', function(){
    return view ('errors.boxowner');
})->name('errors.boxowner');