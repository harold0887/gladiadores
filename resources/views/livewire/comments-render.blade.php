<div class="row">
    @if (isset($comments) && $comments->count() > 0)

    <div class="col-12 col-lg-8 text-center">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title text-center text-primary pb-0 mb-0">{{$commentsAll->count()}} Comentarios</h4>
            </div>
            <div class="card-body">
                <div class="table-full-width table-responsive">
                    <table class="table">
                        <tbody>
                            @foreach ($comments as $comment)
                            <tr>
                                <td class=" text-left " style="width: 50px;">
                                    @if(isset($comment->user->picture))
                                    <img class="avatar border-gray" src="{{ Storage::url($comment->user->picture) }}" alt="...">
                                    @else
                                    <img class="avatar border-gray" src="{{ asset('img/No Profile Picture.png') }}" alt="...">
                                    @endif


                                </td>


                                <td class="text-left">
                                    {{ $comment->comment }}
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $comments->links() }}
                </div>

            </div>

        </div>

    </div>

    @endif
    <div class="col-12 col-lg-4 text-center">
        <div class="card  card-tasks">
            <div class="card-header ">
                <h4 class="card-title text-primary">Escribe sobre tu experiencia</h4>
                <small class="text-justify ">Hágales saber a otros usuarios qué le gustó o no le
                    gustó de nuestro gimnasio.</small>
            </div>
            <div class="card-body ">
                @auth

                <div>
                    <form wire:submit.prevent="addComment">
                        <div class="form-row justify-center">
                            <div class="form-group col-md-12">
                                <textarea type="text" class="form-control border rounded @error('newComment')border-danger @enderror " rows="3" wire:model="newComment"></textarea>
                            </div>
                            @error('newComment')
                            <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class=" btn btn-primary  btn-round btn-outline " type="submit">
                                <span>Enviar comentario</span>
                            </button>
                        </div>

                    </form>
                </div>
                @else
                <h6 class="text-danger">Inicia sesion para dejar un comentario</h6 class="text-warning">
                @endauth
            </div>
        </div>
    </div>
</div>