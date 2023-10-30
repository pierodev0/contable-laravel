<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
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
                 
            'name' => $faker->name,
            'ruc' => $faker->unique()->numerify('10#########'), // Genera un número de 9 dígitos
            'dni' => $faker->unique()->numerify('6########'), // Genera un número de 9 dígitos
            'direction' => $faker->address,            
            'phone' => $faker->unique()->numerify('9########'), // Genera un número de 9 dígitos
            'email' => $faker->unique()->email, 
        ];
    }
}
