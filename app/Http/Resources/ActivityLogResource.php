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
            'is_approved' => $this->is_approved,
            'week_number' => $this->week_number,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'days_absent' => $this->days_absent,
            'days_present' => $this->days_present,
            'summary' => $this->summary,
            'intern_name' => $this->name,
            'intern_img_url' => $this->profile_img_url,
            'created_at' => $this->created_at
        ];
    }
}