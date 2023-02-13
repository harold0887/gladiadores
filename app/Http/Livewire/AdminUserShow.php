<?php

namespace App\Http\Livewire;

use App\User;
use App\Frase;
use App\Order;
use App\Membresia;
use Carbon\Carbon;
use Livewire\Component;

class AdminUserShow extends Component
{
    public $user, $search, $prueba;
    protected $listeners = [
        'addSubscription' => 'addSubscription',
        'CancelarSuscripcion', 'CancelarSuscripcion'
    ];


    public function mount($id)
    {
        $this->user = User::findOrFail($id);


       
    }
    public function render()
    {



        $membresias =  $this->user->orders()->orderBy('fin', 'desc')->get();
        $membresiasActive =  $this->user->orders->where('status_id', 2);
        $lastMembership = $this->user->orders()
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
}
