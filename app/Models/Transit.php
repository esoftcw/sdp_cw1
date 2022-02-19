<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function route(){
        return $this->belongsTo(Route::class);
    }

    public function center(){
        return $this->belongsTo(Center::class);
    }
}
