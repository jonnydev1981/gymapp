<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Statistic;
use App\User;
use App\Workout;
use App\WorkoutLine;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkoutLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = $request->order;
        $reps = $request->reps;
        $rx_reps = $request->rx_reps;
        $weight = $request->weight;
        $rx_weight = $request->rx_weight;
        $workout_id = $request->workout_id;
        $exercise_id = $request->exercise_id;
        $metric = $request->metric;

        foreach ($order as $key => $no) {
            // Check if completed
            if ($reps[$key] === $rx_reps[$key] && $weight[$key] === $rx_weight[$key]) {
                $completed = true;
            } else {
                $completed = false;
            }

            // Check if RX'ed
            if ($weight[$key] === $rx_weight[$key]) {
                $scaled = false;
            } else {
                $scaled = true;
            }

            // Store the WorkoutLine
            $workoutLine = new WorkoutLine();
            $workoutLine->workout()->associate(Workout::find($workout_id[$key]));
            $workoutLine->exercise()->associate(Exercise::find($exercise_id[$key]));
            $workoutLine->order = $no;
            $workoutLine->reps = $reps[$key];
            $workoutLine->weight = $weight[$key];
            $workoutLine->scaled = $scaled;
            $workoutLine->completed = $completed;
            $workoutLine->metric = $metric[$key];
            $workoutLine->save();

            // Check metric is weight
            if ($workoutLine->metric === "weight") {
                // Calculate 1RM
                $oneRepValue = +number_format($this->OneRepMax($workoutLine->reps, $workoutLine->weight),2);

                // Check if exercise record exists
                if (Statistic::where('exercise_id', $exercise_id[$key])
                    ->where('user_id', Auth::id())
                    ->whereNotNull('weight')
                    ->doesntExist()) {
                        // 1RM Doesn't exist, create new
                        $oneRepMax = new Statistic();
                        $oneRepMax->weight = $oneRepValue;
                        $oneRepMax->metric = "weight";
                        $oneRepMax->exercise()->associate(Exercise::find($exercise_id[$key]));
                        $oneRepMax->user()->associate(User::find(Auth::id()));
                        $oneRepMax->save();
                } else {
                    // Find existing 1RM record
                    $oneRepMax = Statistic::where('exercise_id', $exercise_id[$key])
                            ->where('user_id', Auth::id())
                            ->first();

                    // Check if 1RM and update statistics table
                    if ($oneRepMax->weight < $oneRepValue) {
                        $oneRepMax->weight = $oneRepValue;
                        $oneRepMax->save();
                    }
                }
            }

            // Check metric is distance
            if ($workoutLine->metric === "distance") {
                // Check if exercise record exists
                if (Statistic::where('exercise_id', $exercise_id[$key])
                    ->where('user_id', Auth::id())
                    ->whereNotNull('distance')
                    ->doesntExist()) {
                        // 1RM Doesn't exist, create new
                        $oneRepMax = new Statistic();
                        $oneRepMax->distance = $oneRepValue;
                        $oneRepMax->metric = "distance";
                        $oneRepMax->exercise()->associate(Exercise::find($exercise_id[$key]));
                        $oneRepMax->user()->associate(User::find(Auth::id()));
                        $oneRepMax->save();
                } else {
                    // Find existing 1RM record
                    $oneRepMax = Statistic::where('exercise_id', $exercise_id[$key])
                            ->where('user_id', Auth::id())
                            ->whereNotNull('distance')
                            ->first();

                    // Check if 1RM and update statistics table
                    if ($oneRepMax->distance < $oneRepValue) {
                        $oneRepMax->distance = $oneRepValue;
                        $oneRepMax->save();
                    }
                }
            }
        }

        $userWorkouts = Workout::where('user_id', Auth::id())->simplePaginate(10);

        return view('workouts.index')->with('success','Workout logged successfully!')->with('workouts', $userWorkouts);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userWorkoutLines = WorkoutLine::where('workout_id', $id)->get();
        //$userExerciseLines = Exercise::where()->get();

        return view('workoutlines.index')
            ->with('workoutlines', $userWorkoutLines);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function OneRepMax($repetitions, $weight)
    {
        return $weight * (($repetitions / 30) + 1);
    }
}
