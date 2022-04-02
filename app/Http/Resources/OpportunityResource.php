<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OpportunityResource extends JsonResource
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
            'status' => $this->status,
            'customer_name' => $this->customer->name,
            'seller_name' => $this->seller->name,
            'product' => $this->product->name,
            'price' => $this->price,
            'created_at' => $this->created_at
        ];
    }
}
