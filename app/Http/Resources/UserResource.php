<?php

namespace App\Http\Resources;

use App\Models\DriverInfo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'email'     => $this->email,
            'phone'     => $this->phone,
            'role'      => $this->role,
            'status'    => $this->status == 0 ? __('Not Active') : __('Active'),
            'image'     => url('uploads/users/' . $this->image),
            'google_id' => $this->google_id,
            'driver_info'=> new DriverInfoResource($this->whenLoaded('driverinfo'))
        ];
    }
}
