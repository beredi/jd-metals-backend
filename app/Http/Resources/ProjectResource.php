<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "planned_start" => $this->planned_start,
            "planned_end" => $this->planned_end,
            "real_start" => $this->real_start,
            "real_end" => $this->real_end,
            "project_type" => new ProjectTypeResource(
                $this->whenLoaded("projectType")
            ),
            "customer" => new CustomerResource($this->whenLoaded("customer")),
        ];
    }
}
