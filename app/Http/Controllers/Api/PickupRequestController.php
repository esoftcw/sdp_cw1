<?php

namespace App\Http\Controllers\Api;

use App\Dtos\CreatePickUpRequestDto;
use App\Http\Controllers\Controller;
use App\Services\CreatePickUpRequestService;
use Illuminate\Http\Request;

class PickupRequestController extends Controller
{
    public function create(Request $request, CreatePickUpRequestService  $service)
    {
        $service->handle(new CreatePickUpRequestDto($request->all()));
    }
}
