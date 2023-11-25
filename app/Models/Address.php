<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Address extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'lat',
        'lng',
        'address',
        'station'
    ];


    // Relations
    public function order(): Relation
    {
        return $this->belongsTo(Order::class);
    }

}
