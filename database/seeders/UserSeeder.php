<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
//import assignRole


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       $user1= User::create([
            'name' => 'John Doe',
            'email' => 'diegojspro@gmail.com',
            'phone' => '652086306', // Teléfono
            'default_ship_address' => '123 Main St, Anytown, USA',
            'password' => Hash::make('password'),
        ]);

        //crear un usuario con el rol de admin
        $user2= User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '652086306', // Teléfono
            'default_ship_address' => null,
            'password' => Hash::make('oryonshopping6969'),
            ]);

       $user3=  User::create([
            'name' => 'OryonCeoAccount',
            'email' => 'oryon_admin@gmail.com',
            'phone' => '652086306', // Teléfono
            'default_ship_address' => null,
            'password'=> Hash::make('oryonshopping6969'),
            ]);



        $user1->assignRole('Cliente');
        $user2->assignRole('Administrador');
        $user3->assignRole('CEO');
}

}
