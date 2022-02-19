<?php

namespace App\Dtos;

use App\Models\City;
use App\Models\Package;

class CreatePickupDto extends DataTransferObject
{

    public $sender_name;
    public $sender_mobile;
    public $sender_address;
    public $sender_city_id;
    public $shedule;
    public $receivers;


    public function getSenderCity(): City
    {
        return City::find($this->sender_city_id);
    }

    public function price($distance, Package $package){
        $starting_price = 100;
        $additional_km_price = 1;
        $additional_kg_price = 50;

        $distance_price = (max($distance, 1) - 1) * $additional_km_price;
        $volume_weight = ($package->width * $package->height * $package->length)/5000;
        $chargable_weight = max($volume_weight, $package->weight/1000, 1) - 1;
        $weight_price = $chargable_weight * $additional_kg_price;
        $price = $starting_price + $distance_price + $weight_price;
        return round($price);
    }


    public function distance($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'kilometers') {
        $theta = $longitude1 - $longitude2;
        $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
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
}
