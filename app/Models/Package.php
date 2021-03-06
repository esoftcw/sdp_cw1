<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function delivery(){
        return $this->belongsTo(Delivery::class);
    }

    public function volumeWeight(){
        return ($this->width * $this->height * $this->length/5);
    }
}
