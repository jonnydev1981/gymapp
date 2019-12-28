<?php

namespace App\Http\Controllers;

use App\Workout;
use App\WorkoutLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {

        $userWorkouts = Workout::where('user_id', Auth::id())->get();

        // Find all workoutlines for currently logged in user
        foreach ($userWorkouts as $userWorkout) {
            $workoutLines[] = WorkoutLine::where('workout_id', $userWorkout->id)->get()->toArray();
        }

        // Using Bryzycki formula for 1RM

        return view ('dashboards.index');
    }
}
