<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => strtoupper($this->faker->lexify('??'))." ".strtoupper($this->faker->lexify('???'))."-".rand(1000,9999),
        ];
    }
}
