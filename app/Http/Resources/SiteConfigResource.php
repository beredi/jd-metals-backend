<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteConfigResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "address" => $this->address,
            "logo" => $this->logo,
            "phone" => $this->phone,
            "owner" => $this->owner,
            "pib" => $this->pib,
            "maticni_broj" => $this->maticni_broj,
        ];
    }
}
