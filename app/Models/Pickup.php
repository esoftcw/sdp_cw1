<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function address(){
        return $this->belongsTo(Address::class);
    }

    public function center(){
        return $this->belongsTo(Center::class);
    }

    public function shedules(){
        return $this->hasMany(Shedule::class);
    }

    public function deliveries(){
        return $this->hasMany(Delivery::class);
    }

}
