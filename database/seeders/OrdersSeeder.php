<?php

namespace Database\Seeders;

use App\Order;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Order::create([
            'concept'=>'Membresia de prueba',
            'amount'=>650.00,
            'description'=>'Membresia  creada automaticamente',
            'created_by'=>'System',
            'user_id'=>1,
            'status_id'=>1,
            'inicio'=>'2023-01-29 00:00:00',
            'fin'=>'2023-02-28 00:00:00',
        ]);

        Order::create([
            'concept'=>'Membresia de prueba',
            'amount'=>650.00,
            'description'=>'Membresia  creada automaticamente',
            'created_by'=>'System',
            'user_id'=>1,
            'status_id'=>4,
            'confirmed_by'=>'La bestia',
            'date_payment'=>'2022-12-29 00:00:00',
            'inicio'=>'2022-12-29 00:00:00',
            'fin'=>'2023-01-28 00:00:00',
        ]);
        
        Order::create([
            'concept'=>'Membresia de prueba',
            'amount'=>650.00,
            'description'=>'Membresia  creada automaticamente',
            'created_by'=>'System',
            'user_id'=>1,
            'status_id'=>4,
            'confirmed_by'=>'La bestia',
            'date_payment'=>'2022-11-29 00:00:00',
            'inicio'=>'2022-11-29 00:00:00',
            'fin'=>'2022-12-28 00:00:00',
        ]);
        Order::create([
            'concept'=>'Membresia de prueba',
            'amount'=>650.00,
            'description'=>'Membresia  creada automaticamente',
            'created_by'=>'System',
            'date_payment'=>'2022-10-29 00:00:00',
            'confirmed_by'=>'La bestia',
            'user_id'=>1,
            'status_id'=>4,
            'inicio'=>'2022-10-29 00:00:00',
            'fin'=>'2022-11-28 00:00:00',
        ]);

    
    }
}
