<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'performed_on' => $this->performed_on,
            'time_taken' => $this->time_taken,
            'user_id' => $this->user_id,
            'wod_id' => $this->wod_id,
        ];
    }
}
