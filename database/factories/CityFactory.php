<?php

namespace Database\Factories;

use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'district_id' => (District::factory()->create())->id,
            'name' => $this->faker->city,
            'postcode' => $this->faker->postcode,
            'latitude' => $this->faker->latitude(6, 9),
            'longitude' => $this->faker->longitude(80, 81),
        ];
    }
}
