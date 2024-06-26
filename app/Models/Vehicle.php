<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $guarded = [];

    use HasFactory;
    
    public function driver()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
