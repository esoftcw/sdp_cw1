<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'city_id' => rand(1,2000),
            'address' => $this->faker->streetAddress,
        ];
    }
}
