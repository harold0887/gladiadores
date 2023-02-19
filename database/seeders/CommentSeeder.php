<?php

namespace Database\Seeders;

use App\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Comment::create([

            'comment'=>'Gran gimnasio de boxeo y muy buen ambiente! Una suerte poder compartir con Tau y el maestro Heraldo.!!!',
            'user_id'=>4,
            'status'=>1,
            'best'=>1
        
        ]);

        Comment::create([

            'comment'=>'El mejor lugar para entrenar, realmente te enseñan lo que es el boxeo no solo acondicionamiento físico, el profe muy respetuoso y amable.!!!',
            'user_id'=>5,
            'status'=>1,
            'best'=>1
        
        ]);
        Comment::create([
            'comment'=>'El mejor lugar para entrenar box, me encanta',
            'user_id'=>6,
            'status'=>1,
            'best'=>1
        ]);

        Comment::create([
            'comment'=>'Excelente lugar, me encanta entrenar ahi. + 4 años y feliz por encontrar un lugar que cumpla las espectativas.  100% recomendado',
            'user_id'=>7,
            'status'=>1,
            'best'=>1
        ]);
        Comment::create([
            'comment'=>'El mejor lugar para entrenar box, he logrado mis metas. Y el ambiente y atención es el mejor! Super recomendado.',
            'user_id'=>8,
            'status'=>1,
            'best'=>1
        ]);
        Comment::create([
            'comment'=>'Un gran gimnasio de boxeo y un gran maestro dispuesto a compartir su conocimiento con todos los alumnos, se agradece',
            'user_id'=>8,
            'status'=>1,
            'best'=>1
        ]);

        Comment::create([
            'comment'=>'Excelente, llevo 2 años y he hecho amigos, bajado de peso, y aprendido un gran deporte.',
            'user_id'=>9,
            'status'=>1,
            'best'=>1
        ]);
      


        

       

     
    }
}
