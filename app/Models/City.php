<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function addresses(){
        return $this->hasMany(Address::class);
    }
}
