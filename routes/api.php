<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WorkoutController;

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
    Route::get('/', UserController::class, 'index')->name('users');
    Route::post('/', UserController::class, 'store')->name('users.store');
    Route::get('/{id}', UserController::class, 'show')->name('users.store');
    Route::put('/{id}', UserController::class, 'update')->name('users.store');
    Route::delete('/{id}', UserController::class, 'delete')->name('users.delete');
});

Route::prefix('workouts')->group(function () {
    Route::get('/', WorkoutController::class, 'index')->name('workouts');
    Route::post('/', WorkoutController::class, 'store')->name('workouts.store');
    Route::get('/{id}', WorkoutController::class, 'show')->name('workouts.show');
    Route::put('/{id}', WorkoutController::class, 'update')->name('workouts.update');
    Route::delete('/{id}', WorkoutController::class, 'delete')->name('workouts.delete');
});
