<?php

namespace App\Repositories;

use App\Models\Line;
use App\Http\Resources\Line as LineResource;
use Illuminate\Support\Facades\Log;

class Lines extends Repository
{
    public function all(): Repository
    {
        try {
            $lines = Line::all();
            $linesList = LineResource::collection($lines);
        } catch (\Exception $e) {
            Log::error(
                'Something went wrong while getting the lines from the database',
                [
                    'message' => $e->getMessage()
                ]
            );
            $error = true;
        }

        return (new Repository())
            ->setError($error ?? false)
            ->setItems($linesList ?? []);
    }

    public function store($data): Repository
    {
        try {
            $line = Line::create([
                'name' => $data['name'],
                'performed' => $data['performed'],
                'user_id' => $data['user_id']
            ]);
            $singleItem = new LineResource($line);
        } catch (\Exception $e) {
            Log::error(
                'Something went wrong while storing the line into the database',
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
            $line = Line::find($id);
            $singleItem = new LineResource($line);
        } catch (\Exception $e) {
            Log::error(
                'Something went wrong while getting the line into the database',
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
            $line =
                $this->show($id)->getItems();
            $line->name = $data['name'];
            $line->performed = $data['performed'];
            $line->user_id = $data['user_id'];
            $line->save();

            $singleItem = new LineResource($line);
        } catch (\Exception $e) {
            Log::error(
                'Something went wrong while updating the line into the database',
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
            $line =
                $this
                    ->show($id)
                    ->getItems();
            $line->delete();
        } catch (\Exception $e) {
            Log::error(
                'Something went wrong while getting the line into the database',
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
