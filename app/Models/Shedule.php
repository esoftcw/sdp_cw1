<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pickup(){
        return $this->belongsTo(Pickup::class);
    }
}
