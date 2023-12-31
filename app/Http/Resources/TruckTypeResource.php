<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TruckTypeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'image'     => $this->thumbImage,
            'loads'     => LoadResource::collection($this->whenLoaded('loads'))
        ];
    }
}
