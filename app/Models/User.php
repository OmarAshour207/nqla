<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'status',
        'image',
        'google_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Accessors
    public function getUserImageAttribute(): string
    {
        return url('uploads/users/' . $this->image);
    }

    public function getThumbImageAttribute(): string
    {
        return url('uploads/users/thumb_' . $this->image);
    }

    // Scopes

    public function scopeDrivers($query)
    {
        return $query->where('role', 'driver');
    }

    public function scopeUsers($query)
    {
        return $query->where('role', 'user');
    }

    public function scopeProviders($query)
    {
        return $query->where('role', 'provider');
    }

    public function scopeAdmins($query)
    {
        return $query->where('role', 'admin');
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    // relations
    public function driverinfo()
    {
        return $this->hasOne(DriverInfo::class, 'user_id', 'id');
    }


}
