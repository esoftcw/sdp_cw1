<?php

namespace Database\Factories;

use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;
use Symfony\Component\HttpKernel\Profiler\Profile;

class DistrictFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'province_id' => (Province::factory()->create())->id,
            'name' => $this->faker->city,
        ];
    }
}
