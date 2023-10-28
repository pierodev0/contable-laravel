<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movement>
 */
class MovementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
            'type' => $faker->randomElement(['add', 'out']),
            'amount' => $faker->randomFloat(2, 1, 1000),
            'tax' => $faker->randomFloat(2, 0, 100),
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            'account_id' => \App\Models\Account::inRandomOrder()->first()->id,
            'date' => $faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
