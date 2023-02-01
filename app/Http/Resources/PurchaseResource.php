<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
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
            "date_of_purchase" => $this->date_of_purchase,
            "paid" => $this->paid,
            "supplier" => new SupplierResource($this->whenLoaded("supplier")),
            "purchase_items" => PurchaseItemResource::collection(
                $this->whenLoaded("purchaseItems")
            ),
            "project" => new ProjectResource($this->whenLoaded("project")),
        ];
    }
}
