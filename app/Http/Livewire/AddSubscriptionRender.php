<?php

namespace App\Http\Livewire;

use App\Order;
use App\Membresia;
use DateTime;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class AddSubscriptionRender extends Component
{
    public  $membershipSelect = '', $type, $date;






    public function render()
    {

        $membresias = Membresia::all();





        return view('livewire.add-subscription-render', compact('membresias'));
    }


    //confirmar alta de membresia
    public function submit()
    {



        if ($this->type == 'auto') {
            $this->validate([
                'membershipSelect' => 'required|numeric',
                'type' => 'required|string',

            ]);
            $this->date=now();
        } else {
            if ($this->type == 'manual') {
                $this->validate([
                    'membershipSelect' => 'required|numeric',
                    'type' => 'required|string',
                    'date' => 'required|date',
                ]);
            }
        }








        $membresia = Membresia::findOrFail($this->membershipSelect);



        $this->emit('confirmMembershipRegister', [
            'price' =>  number_format($membresia->price_with_discount, 2),
            'message' => "Se va a registrar una " . $membresia->name,
            'frecuencia' => $membresia->frecuencia->name,
            'date' => date_format(new DateTime($this->date),'d-M-Y'),
            'id' =>  $membresia->id
        ]);
    }


    // public function activeDatePiker()
    // {

    //     $this->emit("activeDatePicker");
    // }


}
