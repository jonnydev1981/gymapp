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


Route::get('users', [UserController::class, 'index'])->name('users');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('users/{id}', [UserController::class, 'show'])->name('users.store');
Route::put('users/{id}', [UserController::class, 'update'])->name('users.store');
Route::delete('users/{id}', [UserController::class, 'delete'])->name('users.delete');

Route::get('workouts', [WorkoutController::class, 'index'])->name('workouts');
Route::post('workouts', [WorkoutController::class, 'store'])->name('workouts.store');
Route::get('workouts/{id}', [WorkoutController::class, 'show'])->name('workouts.show');
Route::put('workouts/{id}', [WorkoutController::class, 'update'])->name('workouts.update');
Route::delete('workouts/{id}', [WorkoutController::class, 'delete'])->name('workouts.delete');
