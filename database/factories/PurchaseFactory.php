<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "date_of_purchase" => $this->faker->dateTime,
            "paid" => $this->faker->boolean,
            "supplier_id" => function () {
                return Supplier::factory()->create()->id;
            },
        ];
    }
}
