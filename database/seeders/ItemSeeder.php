<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'name' => 'Camaras web',
                'type' => 'product',
                'unit' => 'unidad',
                'stock' => 10,
                'sell_price' => 100.00,
            ],
            [
                'name' => 'Celulares',
                'type' => 'product',
                'unit' => 'unidad',
                'stock' => 20,
                'sell_price' => 150.00,
            ],
            [
                'name' => 'Tablet',
                'type' => 'product',
                'unit' => 'unidad',
                'stock' => 5,
                'sell_price' => 200.00,
            ],
            
            [
                'name' => 'Diseño web',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 50.00,
            ],
            [
                'name' => 'Instalacion de internet',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 70.00,
            ],
            [
                'name' => 'Soporte tecnico',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 60.00,
            ],
            [
                'name' => 'Instalacion de camaras de seguridad',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 90.00,
            ],
            [
                'name' => 'Marketing digital SEO y branding',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 80.00,
            ],
        ];

        // DB::table('items')->insert($items);
        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
