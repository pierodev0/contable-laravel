<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\Movement;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RoleSeeder::class);

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678')
        ])->assignRole('admin');

        $this->call([
            AccountSeeder::class,
            ClientSeeder::class,
            CategorySeeder::class,
            ItemSeeder::class,
        ]);

        Client::factory(10)->create();
        Movement::factory(10)->create();
    }
}
