<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type'
    ];

    public function getMediaImageAttribute()
    {
        return url('/uploads/temp/' . $this->type . '/' . $this->name);
    }

    public function getTempMediaImageAttribute()
    {
        return url('/uploads/temp/' . $this->type . '/thumb_' . $this->name);
    }
}
