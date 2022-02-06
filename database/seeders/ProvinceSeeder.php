<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::truncate();

        $csvFile = fopen(__DIR__."/data/provinces.csv", "r");
        $isFirstLine = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$isFirstLine) {
                Province::create([
                    "id" => $data['0'],
                    "name" => $data['1'],
                ]);
            }
            $isFirstLine = false;
        }

        fclose($csvFile);
    }
}
