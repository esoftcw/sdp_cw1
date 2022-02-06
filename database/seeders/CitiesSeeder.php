<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();

        $csvFile = fopen(__DIR__."/data/cities.csv", "r");
        $isFirstLine = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$isFirstLine) {
                City::create([
                    "id" => $data['0'],
                    "district_id" => $data['1'],
                    "name" => $data['2'],
                    "postcode" => $data['3'],
                    "latitude" => $data['4'],
                    "longitude" => $data['5'],
                ]);
            }
            $isFirstLine = false;
        }

        fclose($csvFile);
    }
}
