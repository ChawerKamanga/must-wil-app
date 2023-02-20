<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InternResource extends JsonResource
{
    private function checkOrg($value)
    {
        return ($value == null) ? 'Not yet Allocated' : $value->name;
    }

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
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'img_url' => $this->profile_img_url,
            'organization' => $this->checkOrg($this->organization),
            'programme' => $this->programme->name,
            'organization_location' => $this->organization->district->name,
        ];
    }
}