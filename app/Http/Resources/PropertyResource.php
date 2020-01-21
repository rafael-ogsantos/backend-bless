<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
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
            'user_id' => $this->user_id,
            'id' => $this->id,
            'title' => $this->title,
            'negociacao' => $this->negociacao,
            'tipo' => $this->tipo,
            'areap' => $this->areap,
            'areat' => $this->areat,
            'description' => $this->description,
            'valor_tot' => $this->valor_tot,
            'price' => $this->price,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'image' => $this->getImage(),
            'region' => $this->region,
            'zip_code' => $this->zip_code,
            'extra_field' => $this->extra_field
        ];
    }
}
