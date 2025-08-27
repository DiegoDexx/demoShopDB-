<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create(['name' => 'CEO']);
        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Cliente']);

        //asignar roles a los usuarios
        

        
    }
}
