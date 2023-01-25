<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Arnulfo Acosta',
            'nickname'=>'admin',
            'email' => 'harold0887@hotmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('5514404046'),
            'phone'=>'5525182443',
            'created_by'=>'System',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $usuario = User::create([
            'name' => 'Usuario Acosta',
            'nickname'=>'Pacquiao',
            'email' => 'arnulfoacosta0887@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('5514404046'),
            'phone'=>'5525182445',
            'created_by'=>'System',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $admin->assignRole('administrador');
        $admin->assignRole('usuario');
        $usuario->assignRole('usuario');
    }
}
