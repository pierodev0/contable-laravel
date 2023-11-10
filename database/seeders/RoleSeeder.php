<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $empleado = Role::create(['name' => 'empleado']);

        Permission::create(['name' => 'users.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'clients.index'])->syncRoles([$admin,$empleado]);
        Permission::create(['name' => 'clients.create'])->syncRoles([$admin,$empleado]);
        Permission::create(['name' => 'clients.store'])->syncRoles([$admin,$empleado]);
        Permission::create(['name' => 'clients.destroy'])->syncRoles([$admin,$empleado]);

        Permission::create(['name' => 'accounts.index'])->syncRoles([$admin,$empleado]);
        Permission::create(['name' => 'accounts.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'accounts.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'accounts.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'categories.index'])->syncRoles([$admin,$empleado]);
        Permission::create(['name' => 'categories.create'])->syncRoles([$admin,$empleado]);
        Permission::create(['name' => 'categories.store'])->syncRoles([$admin,$empleado]);
        Permission::create(['name' => 'categories.destroy'])->syncRoles([$admin,$empleado]);

        Permission::create(['name' => 'movements.index'])->syncRoles([$admin,$empleado]);
        Permission::create(['name' => 'movements.create'])->syncRoles([$admin,$empleado]);
        Permission::create(['name' => 'movements.store'])->syncRoles([$admin,$empleado]);
        Permission::create(['name' => 'movements.destroy'])->syncRoles([$admin,$empleado]);

        Permission::create(['name' => 'items.index'])->syncRoles([$admin,$empleado]);
        Permission::create(['name' => 'items.create'])->syncRoles([$admin,$empleado]);
        Permission::create(['name' => 'items.store'])->syncRoles([$admin,$empleado]);
        Permission::create(['name' => 'items.destroy'])->syncRoles([$admin,$empleado]);

        Permission::create(['name' => 'invoices.index'])->syncRoles([$admin,$empleado]);
        Permission::create(['name' => 'invoices.create'])->syncRoles([$admin,$empleado]);
        Permission::create(['name' => 'invoices.store'])->syncRoles([$admin,$empleado]);
        Permission::create(['name' => 'invoices.destroy'])->syncRoles([$admin,$empleado]);
    }
}
