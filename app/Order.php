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


    public function Membresia()
    {
        return $this->belongsTo(Membresia::class);
    }
}


