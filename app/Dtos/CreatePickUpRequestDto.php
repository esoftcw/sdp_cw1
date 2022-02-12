<?php

namespace App\Dtos;

use App\Models\City;

class CreatePickUpRequestDto extends DataTransferObject
{
    //TODO: Add other properties
    public $sender_city_id;

    public function getSenderCity(): City
    {
        return City::find($this->sender_city_id);
    }
}
