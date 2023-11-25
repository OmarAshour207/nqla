<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'truck_id',
        'truck_type_id',
        'city_id',
        'price'
    ];

    // relations
    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }

    public function truckType()
    {
        return $this->belongsTo(TruckType::class, 'truck_type_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
