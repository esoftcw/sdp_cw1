<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Center;
use App\Models\Package;
use App\Models\Pickup;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
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
            'address_id' => (Address::factory()->create())->id,
            'center_id' => (Center::factory()->create())->id,
            'name' => $this->faker->name,
            'mobile' => $this->faker->phoneNumber,
        ];
    }
}
