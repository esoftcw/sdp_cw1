<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pickup(){
        return $this->belongsTo(Pickup::class);
    }

    public function center(){
        return $this->belongsTo(Center::class);
    }

    public function packages(){
        return $this->hasMany(Package::class);
    }

}
