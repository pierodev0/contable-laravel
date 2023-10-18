<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'number' => '87456321',
                'type' => 'DNI',
                'name' => 'Juan Pérez',
                'direction' => 'Calle Principal 123',
                'phone' => '123456789',
                'email' => 'juan@example.com',
            ],
            [
                'number' => '1027376668',
                'type' => 'RUC',
                'name' => 'María López',
                'direction' => 'Avenida Secundaria 456',
                'phone' => '987654321',
                'email' => 'maria@example.com',
            ]
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
