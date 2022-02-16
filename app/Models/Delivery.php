<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use KMLaravel\GeographicalCalculator\Facade\GeoFacade;

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

    public function address(){
        return $this->belongsTo(Address::class);
    }

    public function distance(){
        $distance = GeoFacade::setPoint([$this->address->city->latitude, $this->address->city->longitude])
            ->setOptions(['units' => ['km']])
            ->setPoint([$this->pickup->address->city->latitude, $this->pickup->address->city->longitude])
            ->getDistance();

        return round($distance['1-2']['km']);

    }


}
