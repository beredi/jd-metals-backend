<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "product_id" => function () {
                return Product::factory()->create()->id;
            },
            "unit_id" => function () {
                return Unit::factory()->create()->id;
            },
            "price" => $this->faker->randomNumber(5),
            "count" => $this->faker->randomNumber(2),
            "purchase_id" => function () {
                return Purchase::factory()->create()->id;
            },
        ];
    }
}
