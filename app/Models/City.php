<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use Translatable;
    use HasFactory;

    public $timestamps = false;

    public $translationModel = 'App\Models\CityTranslation';

    public $translatedAttributes = ['name'];

    protected $with = [
        'translations'
    ];
}
