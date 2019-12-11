<?php

namespace App\Http\Controllers;

use App\Wod;
use App\WodLine;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class WodController extends Controller
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
                'first_name.*'  => 'required',
                'last_name.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }

            $first_name = $request->first_name;
            $last_name = $request->last_name;
            for ($count = 0; $count < count($first_name); $count++) {
                $data = array(
                    'first_name' => $first_name[$count],
                    'last_name'  => $last_name[$count]
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
}
