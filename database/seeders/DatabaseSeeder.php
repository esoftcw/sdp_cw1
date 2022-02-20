<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Center;
use App\Models\Package;
use App\Models\Pickup;
use App\Models\Route;
use App\Models\Shedule;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProvinceSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(CitySeeder::class);
        $addresses = [
            ['address' => 'Dehiwala Road', 'city_id' => 340],
            ['address' => 'Moratuwa Road', 'city_id' => 358],
            ['address' => 'Ampara Road', 'city_id' => 3],
        ];
        $centers = [
          ['name' => 'Dehiwala Branch', 'address_id' => 1],
          ['name' => 'Moratuwa Branch', 'address_id' => 2],
          ['name' => 'Ampara Branch', 'address_id' => 3],
        ];
        foreach ($centers as $key => $center){
            Center::factory([
                'name' => $center['name'],
                'address_id' =>  Address::factory([
                    'address' => $addresses[$key]['address'],
                    'city_id' => $addresses[$key]['city_id'],
                ])->create()->id,
            ])->create();
        }
        $users = [
            ['name' => 'Rider Dehiwala', 'email' => 'r.dehiwala@gmail.com', 'role' => 'rider', 'center_id' => 1],
            ['name' => 'Rider Moratuwa', 'email' => 'r.moratuwa@gmail.com', 'role' => 'rider', 'center_id' => 2],
            ['name' => 'Rider Ampara', 'email' => 'r.ampara@gmail.com', 'role' => 'rider', 'center_id' => 3],
            ['name' => 'Center Dehiwala', 'email' => 'c.dehiwala@gmail.com', 'role' => 'center-admin', 'center_id' => 1],
            ['name' => 'Center Moratuwa', 'email' => 'c.moratuwa@gmail.com', 'role' => 'center-admin', 'center_id' => 2],
            ['name' => 'Center Ampara', 'email' => 'c.ampara@gmail.com', 'role' => 'center-admin', 'center_id' => 3],
            ['name' => 'Dehiwala - Moratuwa', 'email' => 'd.dehiwala-moratuwa@gmail.com', 'role' => 'driver'],
            ['name' => 'Dehiwala - Ampara', 'email' => 'd.dehiwala-ampara@gmail.com', 'role' => 'driver'],
            ['name' => 'System Admin', 'email' => 'admin@gmail.com', 'role' => 'system-admin'],
        ];
        foreach ($users as $user){
            $usr = User::factory([
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role'],
                'center_id' => ($user['center_id']) ?? null
            ])->create();

            if($user['role'] == 'driver'){
                Route::factory([
                    'name' => $user['name'],
                    'vehicle_id' => Vehicle::factory([
                        'user_id' => $usr->id,
                    ])->create()->id,
                ])->create();
            }
        }


//        Pickup::factory()->create();
//        Shedule::factory()->create();
//        Package::factory()->create();
    }
}
