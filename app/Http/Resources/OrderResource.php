<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'user_email'        => $this->user_email,
            'track_id'          => $this->track_id,
            'delivery_status'   => $this->delivery_status,
            'payment_status'    => $this->payment_status,
            'quantity'          => $this->quantity,
            'vat'               => $this->vat,
            'commission'        => $this->commission,
            'discount'          => $this->discount,
            'sub_total'         => $this->sub_total,
            'total'             => $this->total,
            'time'              => $this->time,
            'addresses'         => AddressResource::collection($this->addresses),
            'user'              => new UserResource($this->user),
            'truck'             => new TruckResource($this->truck),
            'truck_type'        => new TruckTypeResource($this->truckType),
            'load'              => new LoadResource($this->loads),
        ];
    }
}
