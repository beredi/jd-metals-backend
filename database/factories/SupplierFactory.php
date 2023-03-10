<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "address" => $this->faker->address,
            "phone" => $this->faker->optional()->phoneNumber,
            "email" => $this->faker->optional()->email,
        ];
    }
}
