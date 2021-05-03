<?php

//use App\Http\Controllers\Api\UserController;
//use App\Http\Controllers\Api\WorkoutController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->group(function () {
    Route::get('/', 'Api\UserController@index')->name('users.list');
    Route::post('/', 'Api\UserController@store')->name('users.store');
    Route::get('/{id}', 'Api\UserController@show')->name('users.show');
    Route::put('/{id}', 'Api\UserController@update')->name('users.update');
    Route::delete('/{id}', 'Api\UserController@delete')->name('users.delete');
});

Route::prefix('workouts')->group(function () {
    Route::get('/', 'Api\WorkoutController@index')->name('workouts.list');
    Route::post('/', 'Api\WorkoutController@store')->name('workouts.store');
    Route::get('/{id}', 'Api\WorkoutController@show')->name('workouts.show');
    Route::put('/{id}', 'Api\WorkoutController@update')->name('workouts.update');
    Route::delete('/{id}', 'Api\WorkoutController@delete')->name('workouts.delete');
});
