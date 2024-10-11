<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos en español
        Permission::create(['name' => 'gestionar usuarios']);
        Permission::create(['name' => 'ver aspirantes']);
        Permission::create(['name' => 'crear aspirantes']);
        Permission::create(['name' => 'editar aspirantes']);
        Permission::create(['name' => 'eliminar aspirantes']);

        // Crear roles y asignar permisos
        $adminRole = Role::create(['name' => 'administrador']);
        $adminRole->givePermissionTo(['gestionar usuarios', 'ver aspirantes', 'crear aspirantes', 'editar aspirantes', 'eliminar aspirantes']);

        $directorRole = Role::create(['name' => 'director']);
        $directorRole->givePermissionTo(['ver aspirantes', 'crear aspirantes', 'editar aspirantes']);

        $docenteRole = Role::create(['name' => 'docente']);
        $docenteRole->givePermissionTo(['ver aspirantes']);
    }
}
