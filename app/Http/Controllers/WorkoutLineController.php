<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Workout;
use App\WorkoutLine;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Check if completed
        if ($request->rx_reps === $request->reps && $request->rx_sets === $request->sets) {
            $completed = true;
        } else {
            $completed = false;
        }

        // Check if RX'ed
        if ($request->rx_reps === $request->reps && $request->rx_sets === $request->sets) {
            $scaled = false;
        } else {
            $scaled = true;
        }

        $workoutLine = new WorkoutLine();
        $workoutLine->workout()->associate(Workout::find($request->workout_id));
        $workoutLine->exercise()->associate(Exercise::find($request->exercise_id));
        $workoutLine->order = $request->order;
        $workoutLine->sets = $request->sets;
        $workoutLine->reps = $request->reps;
        $workoutLine->weight = $request->weight;
        $workoutLine->scaled = $scaled;
        $workoutLine->completed = $completed;
        $workoutLine->save();

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
