<?php

namespace App\Dtos;

use App\Models\Address;
use App\Models\Center;
use App\Models\City;
use App\Models\Customer;
use App\Models\Pickup;

class CreatePickupDto extends DataTransferObject
{

    public $sender_name;
    public $sender_mobile;
    public $sender_address;
    public $sender_city_id;
    public $receiver_name;
    public $receiver_mobile;
    public $receiver_address;
    public $receiver_city_id;
    public $package_note;
    public $package_weight;
    public $package_size;

    public function __construct(array $parameters = [])
    {
        parent::__construct($parameters);
        $customer = Customer::create([
            'name' => $this->sender_name,
            'mobile' => $this->sender_mobile,
        ]);

        $address = Address::create([
            'city_id' => $this->sender_city_id,
            'address' => $this->sender_address,
        ]);

        $pickup = Pickup::create([
            'customer_id' => $customer->id,
            'address_id' => $address->id,
            'center_id' => '15',
        ]);
        return 'created';
    }

    public function getSenderCity(): City
    {
        return City::find($this->sender_city_id);
    }
}
