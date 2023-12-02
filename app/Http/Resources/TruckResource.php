<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TruckResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'image'     => $this->thumbImage,
            'types'     => TruckTypeResource::collection($this->whenLoaded('types'))
        ];
    }
}
