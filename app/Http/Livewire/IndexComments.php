<?php

namespace App\Http\Livewire;

use App\Comment;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\QueryException;

class IndexComments extends Component
{
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    public $sortDirection = 'desc';
    public $sortField = 'created_at';
    public function render()
    {
        $comments = Comment::leftJoin('users', 'users.id', '=', 'comments.user_id')
            ->select('comments.*', 'users.email as userEmail', 'users.name')
            ->where(function ($query) {
                $query->where('users.name', 'like', '%' . $this->search . '%')
                    ->orWhere('comments.comment', 'like', '%' . $this->search . '%');
            })->orderBy($this->sortField, $this->sortDirection)
            ->paginate(50);

     
        return view('livewire.index-comments', compact('comments'))
            ->extends('layouts.app', [
                'class' => '',
                'folderActive' => '',
                'elementActive' => 'users',
                'title' => 'Comentarios',
                'navbarClass' => 'navbar-transparent',
                'activePage' => 'comments',
            ]);
    }

    public function changeStatusComments($id, $status)
    {
        try {
            Comment::findOrFail($id)->update([
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

    public function changeStatusBest($id, $status)
    {
        try {
            Comment::findOrFail($id)->update([
                'best' => $status == 0 ? true : false
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
        $this->reset(['search']);
    }
}
