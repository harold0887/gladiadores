<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frecuencia extends Model
{
    use HasFactory;


    public function membresia()
    {
        return $this->hasMany(membresia::class);
    }
}
