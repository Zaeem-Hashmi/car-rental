<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function passenger(){
       return $this->belongsTo(User::class,'user_id');
    }
    public function driver(){
        return $this->belongsTo(User::class,'driver_id');
    }
}
