<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Ada',
            'email' => 'ada@ada.com',
            'password' => bcrypt('12345678'), // Usa una contraseña segura
            'role' => 'Admin', // Asigna el rol de administrador
        ]);
    }
}

