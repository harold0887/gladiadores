<?php

namespace App\Http\Livewire;

use App\Membresia;
use Livewire\Component;

class AddSubscriptionRender extends Component
{
    public  $membershipSelect='';

    public function render()
    {
        $membresias = Membresia::all();
        return view('livewire.add-subscription-render', compact('membresias'));
    }


     //confirmar alta de membresia
     public function submit()
     {
         
         $this->validate([
             'membershipSelect' => 'required|numeric',
         ]);
 
         $membresia = Membresia::findOrFail($this->membershipSelect);
      
         $this->emit('confirmMembershipRegister', [
             'message' => "Se va a registrar una " . $membresia->name,
             //'id'=>  $user->id
         ]);
     }
}
