<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PickupRequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'api',
    'prefix' => 'v1'
], function ($router) {

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('customer/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);

    Route::post('/pickup', [PickupRequestController::class, 'create']);

});
