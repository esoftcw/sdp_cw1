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


    protected static function booted()
    {
        static::created(function ($status) {
            $status->delivery->update([
                'status' => $status->status,
            ]);
        });
    }


}
