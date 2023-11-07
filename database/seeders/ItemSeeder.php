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
                'name' => 'Soporte técnico de impresoras',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 50.00,
            ],
            [
                'name' => 'Soporte técnico de laptops',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 100.00,
            ],
            [
                'name' => 'Soporte de cámaras de seguridad',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 120.00,
            ],
            [
                'name' => 'Venta y administración de suministros',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 300.00,
            ],
            [
                'name' => 'PLUS TV (Televisión por Internet)',
                'type' => 'product',
                'unit' => 'unidad',
                'stock' => 20,
                'sell_price' => 1200.00,
            ],
            [
                'name' => 'Outsourcing',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 300.00,
            ],
            [
                'name' => 'Desarrollo de sistemas a medida',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 1000.00,
            ],
            [
                'name' => 'Marketing digital',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 300.00,
            ],
            [
                'name' => 'Diseño web',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 200.00,
            ],
            [
                'name' => 'Kit DE 4, 8, 16, 32 Cámara 720 HD HIKVISION',
                'type' => 'product',
                'unit' => 'unidad',
                'stock' => 20, 
                'sell_price' => 120, 
            ],
            [
                'name' => 'Kit DE 4, 8, 16, 32 Cámara 1080 FULL HD HIKVISION',
                'type' => 'product',
                'unit' => 'unidad',
                'stock' => 50, 
                'sell_price' => 130, 
            ],
            [
                'name' => 'SOPORTE DE CÁMARA DE SEGURIDAD',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 80.00,
            ],
            [
                'name' => 'Cableado DE CÁMARA DE SEGURIDAD',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 70.00,
            ],
            [
                'name' => 'Migración DE CÁMARA DE SEGURIDAD',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 100.00,
            ],
            [
                'name' => 'Configuración DE CÁMARA DE SEGURIDAD',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 100.00,
            ],
            [
                'name' => 'Mantenimiento DE CÁMARA DE SEGURIDAD',
                'type' => 'service',
                'unit' => null,
                'stock' => null,
                'sell_price' => 100.00,
            ],            
            [
                'name' => 'Balum- SUMINISTROS',
                'type' => 'product',
                'unit' => 'unidad',
                'stock' => null, 
                'sell_price' => 60, 
            ],
            [
                'name' => 'Cable UTP (SUMINISTROS)',
                'type' => 'product',
                'unit' => 'unidad',
                'stock' => null, 
                'sell_price' => 80, 
            ],
            [
                'name' => ' Disco Duro (SUMINISTROS)',
                'type' => 'product',
                'unit' => 'unidad',
                'stock' => 100, 
                'sell_price' => 90, 
            ],
            [
                'name' => 'Fuente de Poder',
                'type' => 'product',
                'unit' => 'unidad',
                'stock' => 30, 
                'sell_price' => 60, 
            ],
            
        ];
        

        // DB::table('items')->insert($items);
        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
