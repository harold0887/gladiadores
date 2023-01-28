<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FrecuenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('frecuencias')->insert([
            'name' => 'Anual',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('frecuencias')->insert([
            'name' => 'Semestral',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('frecuencias')->insert([
            'name' => 'Trimestral',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('frecuencias')->insert([
            'name' => 'Mensual',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
