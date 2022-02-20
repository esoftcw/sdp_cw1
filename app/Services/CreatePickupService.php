<?php

namespace App\Services;

use App\Dtos\CreatePickupDto;
use App\Models\Address;
use App\Models\Center;
use App\Models\City;
use App\Models\Customer;
use App\Models\Delivery;
use App\Models\Package;
use App\Models\Pickup;
use App\Models\Shedule;
use App\Models\Transit;
use KMLaravel\GeographicalCalculator\Facade\GeoFacade;

class CreatePickupService
{

    public function handle(CreatePickupDto $pickupDto)
    {
        if(auth()->user()->role != 'customer'){
            $customer = Customer::create([
                'name' => $pickupDto->sender_name,
                'mobile' => $pickupDto->sender_mobile,
            ]);
        } else {
            if(auth()->user()->customer->id){
               $customer = auth()->user()->customer;
            } else {
                $customer = Customer::create([
                    'name' => $pickupDto->sender_name,
                    'mobile' => $pickupDto->sender_mobile,
                    'user_id' => auth()->user()->id,
                ]);
            }
        }

        $senderAddress = Address::create([
            'city_id' => $pickupDto->sender_city_id,
            'address' => $pickupDto->sender_address,
        ]);

        $pickup_center_id = Center::findNearestByCity($pickupDto->getSenderCity())->id;
        $pickup = Pickup::create([
            'customer_id' => $customer->id,
            'address_id' => $senderAddress->id,
            'center_id' => $pickup_center_id,
        ]);

        Shedule::create([
            'pickup_id' => $pickup->id,
            'time' => $pickupDto->shedule,
        ]);

        $pickup_routes = Transit::where('center_id', $pickup_center_id)->pluck('route_id')->toArray();



        foreach ($pickupDto->receivers as $key => $receiver){
            $address = Address::create([
                'city_id' => $receiver['city_id'],
                'address' => $receiver['address'],
            ]);

            $delivery_center_id = Center::findNearestByCity(City::find($receiver['city_id']))->id;
            $delivery_routes = Transit::where('center_id', $delivery_center_id)->pluck('route_id')->toArray();
            $route_id = array_values(array_intersect($pickup_routes, $delivery_routes))[0];

            $delivery = Delivery::create([
                'pickup_id' => $pickup->id,
                'address_id' => $address->id,
                'route_id' => $route_id,
                'center_id' => $delivery_center_id,
                'name' => $receiver['name'],
                'mobile' => $receiver['mobile'],
                'price' => 0,
                'status' => 'pending',
            ]);

            $distance = $pickupDto->distance($senderAddress->city->latitude, $senderAddress->city->longitude, $address->city->latitude, $address->city->longitude);


            foreach ($receiver['packages'] as $package){
                $pkg = Package::create([
                    'delivery_id' => $delivery->id,
                    'weight' => $package['weight'],
                    'width' => $package['width'],
                    'height' => $package['height'],
                    'length' => $package['length'],
                    'note' => $package['note'],
                    'price' => 0
                ]);
                $pkg->update([
                    'price' => $pickupDto->price($distance, $pkg),
                ]);
            }

        }
    }
}
