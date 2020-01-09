<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Wod;
use App\WodLine;
use App\Workout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Workout::where('user_id', Auth::id()));
        $userWorkouts = Workout::where('user_id', Auth::id())->simplePaginate(10);

        return view('workouts.index')->with('workouts', $userWorkouts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workouts.create')->with('wods', Wod::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $request->validate([
            'performed_on' => 'required',
            'time_taken' => 'required|max:8',
        ]);

        $workoutLines = WodLine::where('wod_id', $request->itemName)->get();
        $wod = Wod::where('id', $request->itemName)->first()->toArray();

        $workout = Workout::create([
            'description' => $wod['description'],
            'time_taken' => $request->time_taken,
            'performed_on' => Carbon::createFromFormat('m/d/Y H', $request->performed_on . " 00")->toDateTimeString(),
            'user_id' => Auth::id(),
            'wod_id' => $request->itemName
            ]);

        return view('workouts.create')->with('workout',$workout)->with('workoutlines', $workoutLines)->with('success','Workout created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function dataAjax(Request $request)
    {
        $data = [];

        $search = $request->q;
        $data = DB::table("wods")
                ->select("id","description")
                ->where('description','LIKE',"%$search%")
                ->orderBy('description')
                ->get();

        return response()->json($data);
    }
}
