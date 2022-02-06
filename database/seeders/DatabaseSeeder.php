<?php

namespace Database\Seeders;

use App\Models\Center;
use App\Models\Package;
use App\Models\Pickup;
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
        User::factory()->create([
            'name' => 'Arafath',
            'email' => 'arafath@gmail.com'
        ]);
        Center::factory(20)->create();
        Vehicle::factory(10)->create();
        Pickup::factory()->create();
        Shedule::factory()->create();
        Package::factory()->create();
    }
}
