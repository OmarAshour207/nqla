<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruckType extends Model
{
    use Translatable;
    use HasFactory;

    public $timestamps = false;

    public $translationModel = 'App\Models\TruckTypeTranslation';

    public $translatedAttributes = ['name'];

    protected $fillable = [
        'image',
        'truck_id'
    ];

    protected $with = [
        'translations'
    ];

    // Accessors
    public function getTypeImageAttribute(): string
    {
        return url('uploads/trucks_types/' . $this->image);
    }

    public function getThumbImageAttribute(): string
    {
        return url('uploads/trucks_types/thumb_' . $this->image);
    }

    // Relations
    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }
}
