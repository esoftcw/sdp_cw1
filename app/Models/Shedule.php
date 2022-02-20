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
//
//    protected static function booted()
//    {
//        static::created(function ($shedule) {
//            $pickup = Pickup::find($shedule->pickup_id);
//            $pickup->update([
//                'status' => 'pending',
//            ]);
//        });
//        static::updated(function ($shedule) {
//            $pickup = Pickup::find($shedule->pickup_id);
//            $pickup->update([
//                'status' => $shedule->status,
//            ]);
//        });
//    }
}
