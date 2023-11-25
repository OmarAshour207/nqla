<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverInfo extends Model
{
    use HasFactory;

    protected $table = 'drivers_info';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'front_image_car',
        'back_image_car',
        'license',
        'identity_number'
    ];

    // relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
