<?php

namespace Database\Seeders;

use App\Membresia;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MembresiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Membresia::create([
            'name' => 'Inscripción',
            'frecuencia_id' => 1,
            'price' => 800,
            'discount' => 0,
            'price_with_discount' => 800,
            //'description' =>'Membresia mensual',
            'status' => 1,
            'main' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Membresia::create([
            'name' => 'Membresía Mensual',
            'frecuencia_id' => 4,
            'price' => 899,
            'discount' => 159,
            'price_with_discount' => 750,
            //'description' =>'Membresia mensual',
            'status' => 1,
            'main' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Membresia::create([
            'name' => 'Membresía Anual',
            'frecuencia_id' => 1,
            'price' => 8000,
            'discount' => 1500,
            'price_with_discount' => 6500,
            //'description' =>'Membresia anual',
            'status' => 1,
            'main' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Membresia::create([
            'name' => 'Membresía Trimestral',
            'frecuencia_id' => 3,
            'price' => 2400,
            'discount' => 0,
            'price_with_discount' => 2400,
            //'description' =>'Membresia trimestral',
            'status' => 1,
            'main' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Membresia::create([
            'name' => 'Membresía Semestral',
            'frecuencia_id' => 2,
            'price' => 5100,
            'discount' => 0,
            'price_with_discount' => 5100,
            //'description' =>'Membresia semestral',
            'status' => 1,
            'main' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);



        Membresia::create([
            'name' => 'Membresía Pa los cuates',
            'frecuencia_id' => 4,
            'price' => 650,
            'discount' => 0,
            'price_with_discount' => 650,
            //'description' =>'Membresia para los compas',
            'status' => 0,
            'main' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
