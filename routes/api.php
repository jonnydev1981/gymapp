<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('users')->group(function () {
    Route::get('/', 'UserController@index')->name('users');
    Route::post('/', 'UserController@store')->name('users.store');
    Route::get('/{id}', 'UserController@show')->name('users.store');
    Route::put('/{id}', 'UserController@update')->name('users.store');
    Route::delete('/{id}', 'UserController@delete')->name('users.delete');
});

Route::prefix('workouts')->group(function () {
    Route::get('/', 'WorkoutController@index')->name('workouts');
    Route::post('/', 'WorkoutController@store')->name('workouts.store');
    Route::get('/{id}', 'WorkoutController@show')->name('workouts.show');
    Route::put('/{id}', 'WorkoutController@update')->name('workouts.update');
    Route::delete('/{id}', 'WorkoutController@index')->name('workouts.delete');
});
