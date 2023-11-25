<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'truck_id',
        'truck_type_id',
        'quantity',
        'discount',
        'sub_total',
        'total',
        'time',
    ];

    // Relations
    public function user(): Relation
    {
        return $this->belongsTo(User::class);
    }

    public function truck(): Relation
    {
        return $this->belongsTo(Truck::class);
    }

    public function truckType(): Relation
    {
        return $this->belongsTo(TruckType::class, 'truck_type_id');
    }

    public function addresses(): Relation
    {
        return $this->hasMany(Address::class, 'id', 'order_id');
    }
}
