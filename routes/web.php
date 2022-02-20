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

    Route::post('statuses', [\App\Http\Controllers\StatusController::class, 'store'])->name('statuses.store');
    Route::get('statuses/{status}', [\App\Http\Controllers\StatusController::class, 'create'])->name('statuses.create');

});

Route::resource('pickups', \App\Http\Controllers\PickupController::class);
Route::post('search', function (\Illuminate\Http\Request $request){
    $delivery = \App\Models\Delivery::where('id', $request->search)->first();
    return view('welcome', compact('delivery'));
})->name('search');
