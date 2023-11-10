<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'transferencia',
                'type' => 'add'
            ],
            [
                'name' => 'Afiliados y publicidad',
                'type' => 'add'
            ],
            [
                'name' => 'Ingresos de actividades ordinarias',
                'type' => 'add'
            ],
            [
                'name' => 'Ventas',
                'type' => 'add'
            ],
            [
                'name' => 'Ingresos financieros',
                'type' => 'add'
            ],
            [
                'name' => 'Ganancia por diferencia de cambio',
                'type' => 'add'
            ],
            [
                'name' => 'Seguros de viaje',
                'type' => 'add'
            ],
            [
                'name' => 'Gasto de administracion',
                'type' => 'out'
            ],
            [
                'name' => 'Nóminas',
                'type' => 'out'
            ],
            [
                'name' => 'Gastos de oficina',
                'type' => 'out'
            ],
            [
                'name' => 'Honorarios externos',
                'type' => 'out'
            ],
            [
                'name' => 'Gastos financieros',
                'type' => 'out'
            ],
            [
                'name' => 'Gastos operativos',
                'type' => 'out'
            ],
            [
                'name' => 'Publicidad',
                'type' => 'out'
            ],
            [
                'name' => 'Gastos de tour',
                'type' => 'out'
            ],
            [
                'name' => 'Pago a operadores',
                'type' => 'out'
            ],
            [
                'name' => 'Herramientas online',
                'type' => 'out'
            ],
            [
                'name' => 'Proyectos en desarrollo',
                'type' => 'out'
            ],
            [
                'name' => 'Mobiliario y equipo de oficina',
                'type' => 'out'
            ],
            [
                'name' => 'Otros gastos',
                'type' => 'out'
            ],
            [
                'name' => 'Impuestos',
                'type' => 'out'
            ],
            [
                'name' => 'Saldo inicial',
                'type' => 'add'
            ],
            [
                'name' => 'Desconocidos',
                'type' => 'out'
            ],
            [
                'name' => 'Reembolsos (ingreso)',
                'type' => 'add'
            ],
            [
                'name' => 'Transferencia de saldos',
                'type' => 'out'
            ],
            [
                'name' => 'Recepción de saldo',
                'type' => 'add'
            ],
            [
                'name' => 'Accesorios',
                'type' => 'out'
            ],
            [
                'name' => 'IMSS',
                'type' => 'out'
            ],
            [
                'name' => 'Comisiones',
                'type' => 'add'
            ],
            [
                'name' => 'ComproPago',
                'type' => 'out'
            ]
        ];
        
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
