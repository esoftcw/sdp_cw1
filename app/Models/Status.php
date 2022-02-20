<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function delivery(){
        return $this->belongsTo(Delivery::class);
    }

    public function statusValue(){
        return ucwords(str_replace('_', ' ', $this->status));
    }
}
