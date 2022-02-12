<?php

namespace App\Services;

use App\Dtos\CreatePickUpRequestDto;
use App\Models\Center;
use App\Models\City;

class CreatePickUpRequestService
{


    public function handle(CreatePickUpRequestDto $pickUpRequest)
    {
        $senderCity = $pickUpRequest->getSenderCity();
        $nearestCenter = Center::findNearestByCity($senderCity);
        dd($nearestCenter);
    }
}
