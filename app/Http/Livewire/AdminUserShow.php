<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class AdminUserShow extends Component
{
    public$user, $search, $prueba;
    
    public function mount($id)
    {
        $this->user = User::findOrFail($id);
    }
    public function render()
    {



        $membresias =  $this->user->orders()->orderBy('fin', 'desc')->get();
        $membresiasActive =  $this->user->orders->where('status_id',2);

        return view('livewire.admin-user-show', compact('membresias','membresiasActive'))
        ->extends('layouts.app', [
            'title' =>  $this->user->name,
            'navClass' => 'bg-default',
            'class' => '',
            'folderActive' => 'profile',
            'elementActive' => 'profile',
            'navbarClass'=>'nav-transparent',
            'activePage'=>'users',
            ]);
    }
}