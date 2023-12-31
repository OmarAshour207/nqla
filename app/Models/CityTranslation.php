<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'city_id',
        'locale'
    ];
}
