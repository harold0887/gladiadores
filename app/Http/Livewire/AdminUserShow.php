<?php

namespace App\Http\Livewire;

use App\User;
use App\Frase;
use App\Order;
use App\Membresia;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Arr;

class AdminUserShow extends Component
{
    public $user, $search;
    protected $listeners = [
        'addSubscription' => 'addSubscription',
        'CancelarSuscripcion', 'CancelarSuscripcion',
        'setPayment', 'cancelOrder'
    ];


    public function mount($id)
    {
        $this->user = User::findOrFail($id);
    }
    public function render()
    {



        $membresias =  $this->user->orders()->orderBy('created_at', 'desc')->get();
        $membresiasActive =  $this->user->orders
            ->whereNotIn('membresia_id', [1])
            ->where('status_id', 2);
        $lastMembership = $this->user->orders()
            ->whereNotIn('membresia_id', [1])
            ->whereNotIn('status_id', [3])
            ->orderBy('fin', 'desc')
            ->limit(1)
            ->first();
        $frase = Frase::orderByRaw("RAND()")
            ->limit(1)
            ->pluck("frase");




        return view('livewire.admin-user-show', compact('frase', 'membresias', 'membresiasActive', 'lastMembership'))
            ->extends('layouts.app', [
                'title' =>  $this->user->name,
                'navClass' => 'bg-default',
                'class' => '',
                'folderActive' => 'profile',
                'elementActive' => 'profile',
                'navbarClass' => 'nav-transparent',
                'activePage' => 'users',
            ]);
    }

    public function addSubscription($id, $start)
    {

        $membresia = Membresia::findOrFail($id);



        $active = Order::where('user_id', $this->user->id)
            ->where('status_id', 2)
            ->whereNotIn('membresia_id', [1])
            ->count();



        if ($active >= 1) {
            $this->emit('error', [
                'message' => 'No puede agregar más suscripciones, antes debe cancelar la suscripción actual.',
            ]);
        } else {

            $date = new Carbon($start);
            $end = new Carbon($start);

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
                    'user_id' => $this->user->id,
                    'status_id' => 1,
                    'inicio' => $date,
                    'fin' => $end,
                ]);

                $this->user->update([
                    'renovacion' => 1,

                ]);

                $this->emit('success', [
                    'message' => "Registro exitoso",
                ]);

                $this->emit('reload');
            } catch (\Throwable $th) {

                $this->emit('error', [
                    'message' => 'Error al guardar el registro - ' . $th->getMessage(),
                ]);
            }
        }
    }


    public function changeStatus()
    {
        if ($this->user->renovacion == 1) {

            $this->emit('confirmarCancelacion', [
                'message' => 'Realmente desea cancelar la suscripción automática de ' . $this->user->name,
            ]);
        }
    }


    public function CancelarSuscripcion()
    {
        try {
            $this->user->update([
                'renovacion' => 0,

            ]);
            $this->emit('success', [
                'message' => "La renovación automática fue cancelada.",
            ]);
        } catch (\Throwable $e) {
            $this->emit('error', [
                'message' => 'Error al actualizar el la renovación- ' . $e->getMessage()
            ]);
        }
    }


    public function updatePayment($id)
    {


        $this->emit('confirmPayment', [
            'id' => $id
        ]);
    }

    public function setPayment($cantidad, $id)
    {

        $order = Order::findOrFail($id);




        if (is_numeric($cantidad)) {

            if ($cantidad != $order->amount) {

                $this->emit('error', [
                    'message' => 'La cantidad ingresada no coincide con el precio de la suscripción.'
                ]);
            } else {
                try {
                    $order->update([
                        'confirmed_by' => auth()->user()->name,
                        'date_payment' => now(),
                        'status_id' => 2,
                    ]);
                    $this->emit('success-auto-close', [
                        'message' => "El pago se confirmo con éxito.",
                    ]);
                } catch (\Throwable $e) {
                    $this->emit('error', [
                        'message' => 'Error al actualizar el pago - ' . $e->getMessage()
                    ]);
                }
            }
        } else {
            $this->emit('error', [
                'message' => 'Solo puede ingresar números.'
            ]);
        }
    }

    public function ConfirmCancelOrder($id)
    {
        $this->emit('ConfirmCancelOrder', [
            'id' => $id
        ]);
    }

    public function cancelOrder($id)
    {

        $order = Order::findOrFail($id);

        try {
            $order->update([

                'status_id' => 3,
            ]);
            $this->emit('success-auto-close', [
                'message' => "La orden se actualizo con éxito.",
            ]);
            $this->emit('reload');
        } catch (\Throwable $e) {
            $this->emit('error', [
                'message' => 'Error al cancelar la orden - ' . $e->getMessage()
            ]);
        }
    }
}
