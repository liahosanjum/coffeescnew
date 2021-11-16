<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'id'         => $this->id,
            'name'       => $this->name,
            'sku'        => $this->sku,
            'description'        => $this->image,
            'image'        => $this->image,
            'thumbnail'        => $this->thumbnail,
            
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'status'        => $this->status,
        ];
    }
}