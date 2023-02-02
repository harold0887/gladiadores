<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function frecuencia()
    {
        return $this->belongsTo(Frecuencia::class);
    }
}
