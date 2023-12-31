<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            [
                'name' => 'Cuenta de Ahorros',
                'type' => 'Banco nacional',
                'number' => '123456789',
                'amount' => 1000.00,
                'user_id' => 1
            ],
            [
                'name' => 'Tarjeta de Crédito Visa',
                'type' => 'Tarjeta de credito',
                'number' => '987654321',
                'amount' => 0.00,
                'user_id' => 1
            ],
            [
                'name' => 'Efectivo en Mano',
                'type' => 'Efectivo',
                'number' => '000000001',
                'amount' => 0.00,
                'user_id' => 1
            ],
            [
                'name' => 'Caja general',
                'type' => 'Efectivo',
                'amount' => 0.00,
                'user_id' => 1
            ],
            [
                'name' => 'Caja chica',
                'type' => 'Efectivo',
                'amount' => 0.00,
                'user_id' => 1
            ],


        ];

        foreach ($accounts as $account) {
            Account::create($account);
        }
    }
}
