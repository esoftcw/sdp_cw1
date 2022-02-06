<?php

namespace Database\Factories;

use App\Models\Pickup;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pickup_id' => (Pickup::factory()->create())->id,
            'time' => Carbon::now()->addMinute(),
        ];
    }
}
