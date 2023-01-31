<?php

namespace Database\Seeders;

use App\Frase;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FraseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Frase::create([
            'frase' => 'Para ser un gran campeón, tienes que creer que eres el mejor; si no lo eres, haz como si lo fueras.',
        
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Frase::create([
            'frase' => 'No importa lo fuerte que golpeas, sino lo fuerte que eres cuanto te golpean y sigues avanzando.',
       
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Frase::create([
            'frase' => 'El boxeo no solo cambia tu cuerpo, cambia tu mente, tu actitud y tu humor.',
     
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Frase::create([
            'frase' => 'La distancia entre los sueños y la disiplina se llama disciplina.',
 
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Frase::create([
            'frase' => 'Los campeones no son quienes nunca fallan, son quienes nunca se rinden.',
   
            'created_at' => now(),
            'updated_at' => now()
        ]);
   
    }
}
