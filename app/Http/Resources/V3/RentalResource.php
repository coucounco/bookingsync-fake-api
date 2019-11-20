<?php

namespace App\Http\Resources\V3;

use Illuminate\Http\Resources\Json\JsonResource;

class RentalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'links' => [
                'bedrooms' => $this->bedrooms->pluck('id'),
                'bathrooms' => $this->bathrooms->pluck('id'),
            ]
        ]);
    }
}
