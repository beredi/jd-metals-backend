<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseItemResource extends JsonResource
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
            "name" => $this->product->name,
            "unit" => new UnitResource($this->whenLoaded("unit")),
            "price" => $this->price,
            "count" => $this->count,
            "purchase" => new PurchaseResource($this->whenLoaded("purchase")),
        ];
    }
}
