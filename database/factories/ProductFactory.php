<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'ref' => Str::random(10),
            'name' => $this->faker->words(2, true),
            'price' => $this->faker->randomDigitNotZero(),
            'quantity' => $this->faker->randomDigitNotZero(),
            'description' => $this->faker->words(5, true),
        ];
    }
}
