<?php

namespace App\Http\Controllers\Api;

use App\Dtos\CreatePickupDto;
use App\Http\Controllers\Controller;
use App\Services\CreatePickupService;
use Illuminate\Http\Request;

class PickupController extends Controller
{
    public function create(Request $request, CreatePickupService $service)
    {
        $service->handle(new CreatePickupDto($request->all()));
    }
}
