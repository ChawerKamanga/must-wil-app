<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'week_number' => $this->week_number,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'days_absent' => $this->days_absent,
            'summary' => $this->summary,
            'created_at' => $this->created_at,
            'intern_name' => $this->user->name,
            'intern_img_url' => $this->user->profile_img_url,
        ];
    }
}