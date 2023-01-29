<?php

namespace App\Http\Livewire;

use App\Membresia;
use Livewire\Component;
use Illuminate\Database\QueryException;

class IndexMemberships extends Component
{
    public $search = '';
    public $sortDirection = 'asc';
    public $sortField = 'id';
    public function render()
    {

        $memberships = Membresia::leftJoin('frecuencias', 'frecuencias.id', 'membresias.frecuencia_id')


            ->where(function ($query) {
                $query->where('membresias.name', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->select('membresias.*', 'frecuencias.name as frecuencia')
            ->get();

     
        return view('livewire.index-memberships', compact('memberships'));
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


    public function changeStatus($id, $status)
    {
        try {
            Membresia::findOrFail($id)->update([
                'status' => $status == 0 ? true : false
            ]);
            $this->emit('success-auto-close', [
                'message' => 'El cambio se realizo con éxito',
            ]);
        } catch (QueryException $e) {
            $this->emit('error', [
                'message' => $e->getMessage(),
            ]);
        }
    }
}
