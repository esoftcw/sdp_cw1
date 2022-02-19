<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function routes(){
        return $this->hasMany(Route::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
