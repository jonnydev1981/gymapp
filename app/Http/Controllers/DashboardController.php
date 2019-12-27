<?php

namespace App\Http\Controllers;

use App\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        //$oneRepMaxes = Workout::where('user_id', Auth::id())->workoutlines()->get();
        
        //return view ('dashboards.index')->with('onerepmaxes', $oneRepMaxes);
        return view ('dashboards.index');
    }
}
