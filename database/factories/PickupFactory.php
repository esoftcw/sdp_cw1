<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Center;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class PickupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => (Customer::factory()->create())->id,
            'address_id' => (Address::factory()->create())->id,
            'center_id' => (Center::factory()->create())->id,
        ];
    }
}
