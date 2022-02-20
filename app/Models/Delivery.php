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

    public function distance($unit = 'kilometers') {
        $theta = $this->pickup->address->city->longitude - $this->address->city->longitude;
        $distance = (sin(deg2rad($this->pickup->address->city->latitude)) * sin(deg2rad($this->address->city->latitude))) + (cos(deg2rad($this->pickup->address->city->latitude)) * cos(deg2rad($this->address->city->latitude)) * cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = $distance * 60 * 1.1515;
        switch($unit) {
            case 'miles':
                break;
            case 'kilometers' :
                $distance = $distance * 1.609344;
        }
        return (round($distance,2));
    }

    public function route(){
        return $this->belongsTo(Route::class);
    }

    public function statuses(){
        return $this->hasMany(Status::class);
    }




}
