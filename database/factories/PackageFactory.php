<?php

namespace Database\Factories;

use App\Models\Delivery;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'delivery_id' => (Delivery::factory()->create())->id,
            'weight' => $this->faker->numberBetween(50, 4500),
            'width' => $this->faker->numberBetween(10, 100),
            'height' => $this->faker->numberBetween(10, 100),
            'length' => $this->faker->numberBetween(10, 100),
            'note' => $this->faker->sentence,
        ];
    }
}
