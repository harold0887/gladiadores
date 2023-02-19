<?php

namespace App;

use App\Membresia;
use Ramsey\Uuid\Guid\Guid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];


    //relacion con una membresia
    public function Membresia()
    {
        return $this->belongsTo(Membresia::class);
    }

    //relacion con un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


