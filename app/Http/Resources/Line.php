<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Line extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'set_no' => $this->set_no,
            'reps' => $this->reps,
            'weight_kg' => $this->weight_kg,
            'notes' => $this->notes,
            'workout_id' => $this->workout_id,
            'exercise_id' => $this->exercise_id
        ];
    }
}
