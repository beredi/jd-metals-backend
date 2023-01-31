<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            "is_company" => $this->is_company,
            "name" => $this->name,
            "lastname" => $this->lastname,
            "address" => $this->address,
            "phone" => $this->phone,
            "company_name" => $this->when(
                $this->is_company,
                $this->company_name
            ),
            "pib" => $this->when($this->is_company, $this->pib),
            "maticni_broj" => $this->when(
                $this->is_company,
                $this->maticni_broj
            ),
        ];
    }
}
