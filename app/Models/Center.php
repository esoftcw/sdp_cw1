<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Center extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function address(){
        return $this->belongsTo(Address::class);
    }

    public function pickups(){
        return $this->hasMany(Pickup::class);
    }

    public function deliveries(){
        return $this->hasMany(Delivery::class);
    }

    public function scopeFindNearestByCity(Builder $query, City $city)
    {
        $lat = $city->latitude;
        $lng = $city->longitude;
        $result = DB::table('cities')->selectRaw(
                    "centers.id, cities.name, 111.045 * DEGREES(ACOS(COS(RADIANS(".$lat."))
                             * COS(RADIANS(latitude))
                             * COS(RADIANS(longitude) - RADIANS(".$lng."))
                             + SIN(RADIANS(".$lat."))
                             * SIN(RADIANS(latitude))))
                             AS distance_in_km")
        ->join('addresses', 'addresses.city_id', '=', 'cities.id')
        ->join('centers', 'centers.address_id', '=', 'addresses.id')
        ->orderBy('distance_in_km')
        ->limit(5)
        ->get()->first();
        return Center::find($result->id);
    }

}
