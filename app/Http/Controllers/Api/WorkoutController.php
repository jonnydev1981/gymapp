<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Workouts;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    protected $workoutsRepository;

    public function __construct()
    {
        $this->workoutsRepository = new Workouts();
    }

    public function index()
    {
        $workoutsFetch =
            $this
                ->workoutsRepository
                ->all();

        dd($workoutsFetch);

        if ($workoutsFetch->hasError()) {
            return response()->json($workoutsFetch->getItems(), 500);
        }

        return response()->json($workoutsFetch->getItems(), 200);
    }

    public function store(Request $request)
    {
        $workoutsStore =
            $this
                ->workoutsRepository
                ->store($request->all());

        if ($workoutsStore->hasError()) {
            return response()->json($workoutsStore->getItems(), 500);
        }

        return response()->json($workoutsStore->getItems(), 201);
    }

    public function show($id)
    {
        $workoutFetch =
            $this
                ->workoutsRepository
                ->show($id);

        if ($workoutFetch->hasError()) {
            return response()->json($workoutFetch->getItems(), 500);
        }

        return response()->json($workoutFetch->getItems(), 200);
    }

    public function update($id, Request $request)
    {
        $workoutUpdate =
            $this
                ->workoutsRepository
                ->update($id, $request->all());

        if ($workoutUpdate->hasError()) {
            return response()->json($workoutUpdate->getItems(), 500);
        }

        return response()->json($workoutUpdate->getItems(), 200);
    }

    public function delete($id)
    {
        $workoutDelete =
            $this
                ->workoutsRepository
                ->delete($id);

        if ($workoutDelete->hasError()) {
            return response()->json($workoutDelete->getItems(), 500);
        }

        return response()->json($workoutDelete->getItems(), 200);
    }
}
