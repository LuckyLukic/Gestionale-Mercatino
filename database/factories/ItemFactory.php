<?php

namespace Database\Factories;

use App\Enums\CategoryEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'category' => $this->faker->randomElement(CategoryEnum::values()),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'description' => $this->faker->text(120),
        ];
    }
}
