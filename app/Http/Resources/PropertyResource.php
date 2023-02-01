<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
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
          'uuid' => $this->uuid,
          'address' => [
            'line_1' => $this->address->line_1,
            'line_2' => $this->address->line_2,
            'postcode' => $this->address->postcode,
          ]

        ];
    }
}
