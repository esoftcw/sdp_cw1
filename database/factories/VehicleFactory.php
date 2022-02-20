<?php

namespace Database\Factories;

use App\Models\User;
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
            'user_id' => User::factory()->create()->id,
        ];
    }
}
