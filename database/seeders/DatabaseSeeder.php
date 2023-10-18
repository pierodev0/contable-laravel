<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        \App\Models\User::create([
            'name' => 'Piero Bayona',
            'email' => 'cliente@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $this->call([
            AccountSeeder::class,
            ClientSeeder::class
        ]);
    }
}
