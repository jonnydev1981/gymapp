<?php

namespace App\Repositories;

use App\Models\Workout;
use App\Http\Resources\Workout as WorkoutResource;
use Illuminate\Support\Facades\Log;

class Workouts extends Repository
{
    public function all(): Repository
    {
        try {
            $workouts = Workout::all();
            $workoutsList = WorkoutResource::collection($workouts);
        } catch (\Exception $e) {
            Log::error(
                'Something went wrong while getting the workouts from the database',
                [
                    'message' => $e->getMessage()
                ]
            );
            $error = true;
        }

        return (new Repository())
            ->setError($error ?? false)
            ->setItems($workoutsList ?? []);
    }

    public function store($data): Repository
    {
        try {
            $workout = Workout::create([
                'name' => $data['name'],
                'performed' => $data['performed'],
                'user_id' => $data['user_id']
            ]);
            $singleItem = new WorkoutResource($workout);
        } catch (\Exception $e) {
            Log::error(
                'Something went wrong while storing the workout into the database',
                [
                    'message' => $e->getMessage()
                ]
            );
            $error = true;
        }

        return (new Repository())
            ->setError($error ?? false)
            ->setItems($singleItem ?? []);
    }

    public function show($id): Repository
    {
        try {
            $workout = Workout::find($id);
            $singleItem = new WorkoutResource($workout);
        } catch (\Exception $e) {
            Log::error(
                'Something went wrong while getting the workout into the database',
                [
                    'message' => $e->getMessage()
                ]
            );
            $error = true;
        }

        return (new Repository())
            ->setError($error ?? false)
            ->setItems($singleItem ?? []);
    }

    public function update($id, $data): Repository
    {
        try {
            $workout =
                $this->show($id)->getItems();
            $workout->name = $data['name'];
            $workout->performed = $data['performed'];
            $workout->user_id = $data['user_id'];
            $workout->save();

            $singleItem = new WorkoutResource($workout);
        } catch (\Exception $e) {
            Log::error(
                'Something went wrong while updating the workout into the database',
                [
                    'message' => $e->getMessage()
                ]
            );
            $error = true;
        }

        return (new Repository())
            ->setError($error ?? false)
            ->setItems($singleItem ?? []);
    }

    public function delete($id): Repository
    {
        try {
            $workout =
                $this
                    ->show($id)
                    ->getItems();
            $workout->delete();
        } catch (\Exception $e) {
            Log::error(
                'Something went wrong while getting the workout into the database',
                [
                    'message' => $e->getMessage()
                ]
            );
            $error = true;
        }

        return (new Repository())
            ->setError($error ?? false);
    }
}
