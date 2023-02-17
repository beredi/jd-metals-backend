<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiteConfigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->company,
            "description" => $this->faker->text,
            "address" => $this->faker->address,
            "logo" => $this->faker->imageUrl,
            "phone" => $this->faker->phoneNumber,
            "owner" => $this->faker->name,
            "pib" => $this->faker->numerify("######"),
            "maticni_broj" => $this->faker->numerify("######"),
        ];
    }
}
