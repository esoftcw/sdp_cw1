<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function transits(){
        return $this->hasMany(Transit::class);
    }

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
}
