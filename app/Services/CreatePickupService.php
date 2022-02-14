<?php

namespace App\Services;

use App\Dtos\CreatePickupDto;
use App\Models\Center;
use App\Models\City;

class CreatePickupService
{
    public function handle(CreatePickupDto $pickUpRequest)
    {
        $senderCity = $pickUpRequest->getSenderCity();
        $nearestCenter = Center::findNearestByCity($senderCity);
        dd($nearestCenter);
    }
}
