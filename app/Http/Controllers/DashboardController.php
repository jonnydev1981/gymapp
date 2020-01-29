<?php

namespace App\Http\Controllers;

use App\Statistic;
use App\User;
use App\Wod;
use App\Workout;
use App\WorkoutLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $distanceStats = Statistic::where('user_id', Auth::id())
        ->where('metric_id', '1')
        ->get();

        $timeStats = Statistic::where('user_id', Auth::id())
        ->where('metric_id', '3')
        ->get();

        $weightStats = Statistic::where('user_id', Auth::id())
        ->where('metric_id', '4')
        ->get();

        return view ('dashboards.index')
        ->with('distancestats', $distanceStats)
        ->with('timestats', $timeStats)
        ->with('weightstats', $weightStats);
    }

    public function boxindex() {
        $boxMembers = User::where('box_id', Auth::user()->box_id)
        ->where('permission', 'user')
        ->get();

        $boxWODs = Wod::where('box_id', Auth::user()->box_id)
        ->get();

        return view ('dashboards.boxindex')
        ->with('members', $boxMembers)
        ->with('wods', $boxWODs);
    }
}
