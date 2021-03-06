<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function center(){
        return $this->hasOne(Center::class);
    }

    public function pickups(){
        return $this->hasMany(Pickup::class);
    }
    public function deliveries(){
        return $this->hasMany(Delivery::class);
    }

}
