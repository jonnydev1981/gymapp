<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', 'DashboardController@index')->middleware(['auth'])->name('dashboard');
Route::resource('workout','WorkoutController')->middleware(['auth']);
Route::resource('dashboard','DashboardController')->middleware(['auth']);
Route::resource('exercise','ExerciseController')->middleware(['auth']);

require __DIR__.'/auth.php';
