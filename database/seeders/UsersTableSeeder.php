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

        $usuario1 = User::create([
            'name' => 'Sandra Jazmin Cano Valencia',
            'nickname'=>'Sandra',
            'email' => 'jazmincv1247@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('5514404046'),
            'phone'=>'5585625311',
            'created_by'=>'System',
            'created_at' => now(),
            'updated_at' => now()
        ]);





        $admin->assignRole('administrador');
        $admin->assignRole('usuario');
        $usuario->assignRole('usuario');


        for ($i=11; $i <99 ; $i++) { 
            $new = User::create([
                'name' => 'Usuario '.$i,
                'nickname'=>'user '.$i,
                'email' => 'user'.$i.'@hotmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'phone'=>'55251823'.$i,
                'created_by'=>'System',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $new->assignRole('usuario');
        }
    }
}
