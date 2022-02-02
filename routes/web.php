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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::redirect('/', '/home');
Route::view('home', 'app.dashboard')->name('dashboard');



Auth::routes();





Route::group([
    'prefix' => 'app',
    'as' => 'app.',
//    'middleware' => ['auth', 'admin']
], function() {
    Route::redirect('/', '/app/dashboard');
    Route::view('dashboard', 'app.dashboard')->name('dashboard');
});

