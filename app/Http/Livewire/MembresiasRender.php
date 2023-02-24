<?php

namespace App\Http\Livewire;

use App\Order;
use App\Membresia;
use Carbon\Carbon;
use Livewire\Component;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

class MembresiasRender extends Component
{
    public $idSuscripcion, $price, $type, $inicio, $fin;


    public function render()
    {
        $memberships = Membresia::where('status', 1)->get();

        return view('livewire.membresias-render', compact('memberships'))
            ->extends('layouts.app', [
                'class' => 'login-page',
                'backgroundImagePath' => '',
                'folderActive' => '',
                'elementActive' => '',
                'title' => 'Membresias',
                'navbarClass' => 'bg-dark py-3',
                'activePage' => 'membership',
            ])


            ->section('content');
    }


    public function setData($id)
    {
        $membresia = Membresia::findOrFail($id);
        $this->emit('confirm-user-add-membreship');





        $this->idSuscripcion = $membresia->id;
        $this->price = $membresia->price_with_discount;
        $this->type = $membresia->name;
        $this->inicio = date_format(new Carbon(now()), 'd-M-Y');

        $end = new Carbon(now());

        switch ($membresia->frecuencia->id) {
            case '1':
                $this->fin = date_format($end->addYear()->subDay(), 'd-M-Y');
                break;
            case '2':
                $this->fin = date_format($end->addMonth(6)->subDay(), 'd-M-Y');
                break;
            case '3':
                $this->fin = date_format($end->addMonth(3)->subDay(), 'd-M-Y');
                break;
            case '4':
                $this->fin = date_format($end->addMonth()->subDay(), 'd-M-Y');
                break;
        }
    }


    public function adSubscriptions()
    {

        $membresia = Membresia::findOrFail($this->idSuscripcion);


        $active = Order::where('user_id', auth()->user()->id)
            ->where('status_id', 2)
            ->whereNotIn('membresia_id', [1])
            ->count();



        if ($active >= 1) {
            $this->emit('error', [
                'message' => 'No puede inscribirse a esta membresia, tiene una suscripción activa. Contactar al administrador..',
            ]);
        } else {

            $date = new Carbon(now());
            $end = new Carbon(now());

            switch ($membresia->frecuencia->id) {
                case '1':
                    $end->addYear()->subDay();
                    break;
                case '2':
                    $end->addMonth(6)->subDay();
                    break;
                case '3':
                    $end->addMonth(3)->subDay();
                    break;
                case '4':
                    $end->addMonth()->subDay();
                    break;
            }

            try {
                Order::create([
                    'membresia_id' => $membresia->id,
                    'amount' => $membresia->price_with_discount,
                    'description' => 'Membresia  creada por' . auth()->user()->name,
                    'created_by' => auth()->user()->name,
                    'user_id' => auth()->user()->id,
                    'status_id' => 1,
                    'inicio' => $date,
                    'fin' => $end,
                ]);

                $this->emit('success', [
                    'message' => 'Inscripción realizada con éxito',
                ]);

                $this->emit('reload');
                //enviar email
                $correo = new OrderShipped($membresia, auth()->user()->name);
                Mail::to(auth()->user()->email)->send($correo);


                
            } catch (\Throwable $th) {

                $this->emit('error', [
                    'message' => 'Error al realizar la inscripción - ' . $th->getMessage(),
                ]);
            }
        }
    }
}
