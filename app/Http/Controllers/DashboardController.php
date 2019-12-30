<?php

namespace App\Http\Controllers;

use App\Statistic;
use App\Workout;
use App\WorkoutLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $distanceStats = Statistic::where('user_id', Auth::id())
        ->where('metric', 'distance')
        ->get();

        $timeStats = Statistic::where('user_id', Auth::id())
        ->where('metric', 'time')
        ->get();

        $weightStats = Statistic::where('user_id', Auth::id())
        ->where('metric', 'weight')
        ->get();

        return view ('dashboards.index')
        ->with('distancestats', $distanceStats)
        ->with('timestats', $timeStats)
        ->with('weightstats', $weightStats);
    }

    public function boxindex() {
        $distanceStats = Statistic::where('user_id', Auth::id())
        ->where('metric', 'distance')
        ->get();

        $timeStats = Statistic::where('user_id', Auth::id())
        ->where('metric', 'time')
        ->get();

        $weightStats = Statistic::where('user_id', Auth::id())
        ->where('metric', 'weight')
        ->get();

        return view ('dashboards.boxindex')
        ->with('distancestats', $distanceStats)
        ->with('timestats', $timeStats)
        ->with('weightstats', $weightStats);
    }
}
