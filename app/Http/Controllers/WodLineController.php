<?php

namespace App\Http\Controllers;
use App\WodLine;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class WodLineController extends Controller
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
        if ($request->ajax()) {
            $rules = array(
                'order.*'  => 'required',
                'rx_reps.*'  => 'required',
                'rx_amount_m.*'  => 'required',
                'rx_amount_f.*'  => 'required',
                'exercise_id.*'  => 'required',
                'metric_id.*' => 'required',
                'measurement_id.*' => 'required',
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }

            $order = $request->order;
            $rx_reps = $request->rx_reps;
            $rx_amount_m = $request->rx_amount_m;
            $rx_amount_f = $request->rx_amount_f;
            $exercise_id = $request->exercise_id;
            $metric_id = $request->metric_id;
            $measurement_id = $request->measurement_id;
            $wod_id = $request->wod_id;
            for ($count = 0; $count < count($exercise_id); $count++) {
                $data = array(
                    'order' => $order[$count],
                    'rx_reps' => $rx_reps[$count],
                    'rx_amount_m' => $rx_amount_m[$count],
                    'rx_amount_f' => $rx_amount_f[$count],
                    'exercise_id' => $exercise_id[$count],
                    'metric_id' => $metric_id[$count],
                    'measurement_id' => $measurement_id[$count],
                    'wod_id' => $wod_id[$count]
                );
                $insert_data[] = $data;
            }

            WodLine::insert($insert_data);
            return response()->json([
                'success'  => 'Data Added successfully.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wodLines = WodLine::where('wod_id', $id)->get();
        //$userExerciseLines = Exercise::where()->get();

        return view('wodlines.index')
            ->with('wodlines', $wodLines);
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
