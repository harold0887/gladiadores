<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            'name' => 'Pending',
            'created_at' => now(),
            'updated_at' => now()
        ]);
         DB::table('status')->insert([
            'name' => 'Active',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('status')->insert([
            'name' => 'Cancel',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('status')->insert([
            'name' => 'Expired',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('status')->insert([
            'name' => 'Suspendida',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
    }
}
