<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use Translatable;
    use HasFactory;

    public $timestamps = false;

    public $translationModel = 'App\Models\TruckTranslation';

    public $translatedAttributes = ['name'];

    protected $fillable = [
        'image'
    ];

    protected $with = [
        'translations'
    ];

    public function getTruckImageAttribute(): string
    {
        return url('uploads/trucks/' . $this->image);
    }

    public function getThumbImageAttribute(): string
    {
        return url('uploads/trucks/thumb_' . $this->image);
    }
}
