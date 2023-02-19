<?php

namespace App\Http\Livewire;

use App\User;
use App\Order;
use App\Membresia;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class IndexUsers extends Component
{
    public $search = '';
    public $sortDirection = 'asc';
    public $sortField = 'id';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $users = User::where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('nickname', 'like', '%' . $this->search . '%');
        })
            ->whereNotIn('email', ['harold0887@hotmail.com'])
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(50);

        return view('livewire.index-users', compact('users'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
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
