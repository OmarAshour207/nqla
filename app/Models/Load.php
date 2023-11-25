<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Load extends Model
{
    use Translatable;

    public $timestamps = false;

    public $translationModel = 'App\Models\LoadTranslation';

    public $translatedAttributes = ['name'];

    protected $fillable = [
        'truck_id',
        'truck_type_id'
    ];

    protected $with = [
        'translations'
    ];


    // Relations
    public function truck(): Relation
    {
        return $this->belongsTo(Truck::class);
    }

    public function truckType(): Relation
    {
        return $this->belongsTo(TruckType::class, 'truck_type_id');
    }


}
