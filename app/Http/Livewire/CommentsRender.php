<?php

namespace App\Http\Livewire;

use App\Comment;
use Livewire\Component;
use Livewire\WithPagination;


class CommentsRender extends Component
{
    public $newComment;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'newComment' => 'required|string',
    ];
    protected $messages = [
        'newComment.required' => 'El comentario no puede estar vacío.',
    ];
    public function render()
    {
        $comments = Comment::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $commentsAll = Comment::where('status', 1)

            ->get();
        return view('livewire.comments-render', compact('comments', 'commentsAll'));
    }

    public function addComment()
    {

        $this->validate();

        // Execution doesn't reach here if validation fails.

        try {
            Comment::create([
                'comment' => $this->newComment,
                'user_id' => auth()->user()->id,
                'status' => 1,
                'best' => 0
            ]);
            $this->emit('success-auto-close', [
                'message' => 'Gracias por su comentario.',
            ]);
            $this->reset(['newComment']);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
