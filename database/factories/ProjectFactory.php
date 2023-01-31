<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\ProjectType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->word,
            "description" => $this->faker->sentence,
            "planned_start" => $this->faker->dateTime,
            "planned_end" => $this->faker->dateTime,
            "real_start" => $this->faker->dateTime,
            "real_end" => $this->faker->dateTime,
            "project_type_id" => function () {
                return ProjectType::factory()->create()->id;
            },
            "customer_id" => function () {
                return Customer::factory()->create()->id;
            },
        ];
    }
}
