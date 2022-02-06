<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::truncate();

        $csvFile = fopen(__DIR__."/data/districts.csv", "r");
        $isFirstLine = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$isFirstLine) {
                District::create([
                    "id" => $data['0'],
                    "province_id" => $data['1'],
                    "name" => $data['2'],
                ]);
            }
            $isFirstLine = false;
        }

        fclose($csvFile);
    }
}
