<?php

namespace App;

use App\Order;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    use HasRoles;

    protected $fillable = [
        'name','nickname','email', 'password', 'picture','phone','created_by','renovacion'
    ];

   
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function profilePicture()
    {
        if ($this->picture) {
            return "/storage/{$this->picture}";
        }

        return 'http://i.pravatar.cc/200';
    }


    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


   

 

}
