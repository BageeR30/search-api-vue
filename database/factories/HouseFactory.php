<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\House>
 */
class HouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'bedrooms' => $this->faker->numberBetween(1,15),
            'bathrooms' => $this->faker->numberBetween(1,15),
            'storeys' => $this->faker->numberBetween(1,15),
            'garages' => $this->faker->numberBetween(1,15),
            'price' => $this->faker->numberBetween(10000,1000000)
        ];
    }
}
