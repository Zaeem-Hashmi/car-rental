<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ADMIN_ROLE = 1;
    const DRIVER_ROLE = 2;
    const PASSENGER_ROLE = 3;

   
    protected $guarded = [];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
    public function expense()
    {
        return $this->hasMany(Expense::class);
    }
    public function vehicle()
    {
        return $this->hasMany(Vehicle::class);
    }
}
