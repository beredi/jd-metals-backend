<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "is_company" => false,
            "name" => $this->faker->name,
            "lastname" => $this->faker->lastName,
            "phone" => $this->faker->phoneNumber,
            "address" => $this->faker->address,
            "email" => $this->faker->email,
        ];
    }
}
