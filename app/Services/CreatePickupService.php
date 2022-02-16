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
use KMLaravel\GeographicalCalculator\Facade\GeoFacade;

class CreatePickupService
{
    public function handle(CreatePickupDto $pickupDto)
    {
        $customer = Customer::create([
            'name' => $pickupDto->sender_name,
            'mobile' => $pickupDto->sender_mobile,
        ]);

        $senderAddress = Address::create([
            'city_id' => $pickupDto->sender_city_id,
            'address' => $pickupDto->sender_address,
        ]);

        $pickup = Pickup::create([
            'customer_id' => $customer->id,
            'address_id' => $senderAddress->id,
            'center_id' => Center::findNearestByCity($pickupDto->getSenderCity())->id,
        ]);

        foreach ($pickupDto->receivers as $key => $receiver){
            $address = Address::create([
                'city_id' => $receiver['city_id'],
                'address' => $receiver['address'],
            ]);

            $delivery = Delivery::create([
                'pickup_id' => $pickup->id,
                'address_id' => $address->id,
                'center_id' => Center::findNearestByCity(City::find($receiver['city_id']))->id,
                'name' => $receiver['name'],
                'mobile' => $receiver['mobile'],
                'price' => 0,
                'status' => 'pending',
            ]);
            $distance = GeoFacade::setPoint([$senderAddress->city->latitude, $senderAddress->city->longitude])
                ->setOptions(['units' => ['km']])
                ->setPoint([$address->city->latitude, $address->city->longitude])
                ->getDistance();

            foreach ($receiver['packages'] as $package){
                $package = Package::create([
                    'delivery_id' => $delivery->id,
                    'weight' => $package['weight'],
                    'width' => $package['width'],
                    'height' => $package['height'],
                    'length' => $package['length'],
                    'note' => $package['note'],
                    'price' => 0
                ]);
                $package->update([
                    'price' => $pickupDto->price($distance['1-2']['km'], $package),
                ]);
            }
        }

        return redirect()->route('pickups.index');

    }
}
