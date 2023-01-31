<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Illuminate\Http\Request;    

class IndexAdministrators extends Component
{
    public $search = '', $userSelect='';
    public $selectedInput = '';
    public $sortDirection = 'asc';
    public $sortField = 'id';

    protected $listeners = [
        'authorizeAdmin' => 'authorizeAdmin',
        'removeAdmin' => 'removeAdmin',
        'setUserSelect'=>'setUserSelect',
        'refreshComponent' => '$refresh'
    ];
    public function render()
    {
        $users = User::whereNotIn('email', ['arnulfoacosta0887@gmail.com'])->get();

        $administradores = User::role('administrador')->where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('nickname', 'like', '%' . $this->search . '%');
        })
            //->whereNotIn('email', ['harold0887@hotmail.com'])
            ->orderBy($this->sortField, $this->sortDirection)
            ->get();

        //dd($users);
        return view('livewire.index-administrators',compact('users','administradores'))
            ->extends('layouts.app', [
                'class' => '',
                'folderActive' => '',
                'elementActive' => 'users',
                'title' => 'Administradores',
                'navbarClass' => 'navbar-transparent',
                'activePage' => 'administradores',
            ]);
    }

    public function setUserSelect($id){
        $this->userSelect=$id;
        $this->emit('refreshComponent');
    }

    public function  removeAdminConfirm($id, $name)
    {
        $this->emit('removeAdminConfirm', [
            'message' => 'Relamente desea remover los permisos de administrador para "' . $name . '"',
            'id' => $id,
        ]);
    }



    public function removeAdmin(Request $request, $id)
    {


        if ($request->user()->hasAnyRole(['administrador'])) {

            try {
                if ($request->user()->id == $id) {
                    $this->emit('error', [
                        'message' => 'No puede remover los permisos de administrador a su propio usuario',
                    ]);
                } else {
                    $user = User::findOrFail($id);

                    $rolesSum = User::role(['administrador'])->get();

                    if ($rolesSum->count() > 1) {
                        $user->removeRole('administrador');
  

                        $this->emit('success-auto-close', [
                            'message' => 'Los permisos de administrador fueron removidos correctamente',
                        ]);
                    } else {
                        $this->emit('error', [
                            'message' => 'Ocurrio un error al remover los permisos - Deben existir al menos dos administradores, por favor registra a otros administradores antes de remover los permisos.',
                        ]);
                    }
                }
            } catch (\Throwable $e) {
                $this->emit('error', [
                    'message' => 'Ocurrio un error al remover los permisos - ' . $e->getMessage(),
                ]);
            }
        } else {
            $this->emit('error', [
                'message' => 'No tiene permisos elimiar un administrador',
            ]);
        }
    }

    public function reload()
    {
        $this->emit('reload');
    }


   


    public function authorizeAdmin(Request $request)
    {
    
        if ($request->user()->hasAnyRole(['administrador','super-admin'])) {

            try {
                $user = User::findOrFail($this->userSelect);
                if ($user->hasRole('administrador')) {
                    $this->emit('error', [
                        'message' => 'El usuario ' . $user->name . ' ya tiene un rol de administrador',
                    ]);
                } else {
                    $user->assignRole('administrador');

                    $this->emit('success-auto-close', [
                        'message' => 'El registro se ha realizado con  éxito',
                    ]);
                    $this->reset(['userSelect']);
                    $this->emit('reload');
                }
            } catch (\Throwable $e) {
                $this->emit('error', [
                    'message' => 'Ocurrio un error al registrar los permisos - ' . $e->getMessage(),
                ]);
            }
        } else {
            $this->emit('error', [
                'message' => 'No tiene permisos para dar de alta mas admistradores',
            ]);
        }
    }


    






















    //sort
    public function setSort($field)
    {

        $this->sortField = $field;

        if ($this->sortDirection == 'desc') {
            $this->sortDirection = 'asc';
        } else {
            $this->sortDirection = 'desc';
        }
    }
    public function clearSearch()
    {
        $this->search = "";
    }
}