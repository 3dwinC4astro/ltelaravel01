<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Llama al seeder de roles y permisos
        $this->call(RolesAndPermissionsSeeder::class);

        // Crea un usuario y le asigna el rol de administrador
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456789'), // Cambia esto por una contraseña segura
        ]);

        // Asigna el rol de administrador
        $admin->assignRole('administrador');
    }
}
