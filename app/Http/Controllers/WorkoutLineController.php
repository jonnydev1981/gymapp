<?php

namespace App\Http\Controllers;

use App\Exercise;
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
        $workout_id = $request->workout_id;
        $exercise_id = $request->exercise_id;

        //dd($order);

        foreach ($order as $key => $no) {
            // Check if completed
            if ($reps[$key] === $rx_reps[$key]) {
                $completed = true;
            } else {
                $completed = false;
            }

            // Check if RX'ed
            if ($reps[$key] === $rx_reps[$key]) {
                $scaled = false;
            } else {
                $scaled = true;
            }

            $workoutLine = new WorkoutLine();
            $workoutLine->workout()->associate(Workout::find($workout_id[$key]));
            $workoutLine->exercise()->associate(Exercise::find($exercise_id[$key]));
            $workoutLine->order = $no;
            $workoutLine->reps = $reps[$key];
            $workoutLine->weight = $weight[$key];
            $workoutLine->scaled = $scaled;
            $workoutLine->completed = $completed;
            $workoutLine->save();
        }

        $userWorkouts = Workout::where('user_id', Auth::id())->get();

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
}
