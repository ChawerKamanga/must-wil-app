<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SingleOrganizationResource extends JsonResource
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
            'name' => $this->name,
            'district' => $this->district->name,
            'no_of_interns' => $this->users()->where('role_id', 4)->count(),
            'industrial_supervisor' => $this->users()->where('role_id', 3)->first()->name,
            'interns' => InternResource::collection($this->users()->where('role_id', 4)->get()),
            'img_url' => $this->img_url,
        ];
    }
}