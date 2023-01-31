<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class AddAdminRender extends Component
{
    public  $userSelect='';
    public function render()
    {
        $users = User::whereNotIn('email', ['arnulfoacosta0887@gmail.com'])->get();
        return view('livewire.add-admin-render',compact('users'));
    }


     //confirmar alta de administrador
     public function submit()
     {
         
         $this->validate([
             'userSelect' => 'required',
         ]);
 
         $user = User::findOrFail($this->userSelect);
      
         $this->emit('confirmAdminRegister', [
             'message' => "Se van a dar permisos de administrador de sistema a " . $user->name
         ]);
     }
}
