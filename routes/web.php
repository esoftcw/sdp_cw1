<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('centers', \App\Http\Controllers\CenterController::class);
    Route::resource('vehicles', \App\Http\Controllers\VehicleController::class);
    Route::resource('routes', \App\Http\Controllers\RouteController::class);
    Route::resource('transits', \App\Http\Controllers\TransitController::class);

});

Route::resource('pickups', \App\Http\Controllers\PickupController::class);
