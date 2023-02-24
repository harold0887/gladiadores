<div class="content">
    <div class="container-fluid mt--6  ">
        <div class="row m-0">
            <div class="col-12 border-bottom ">
                <h4 class="m-0  text-center">Comentarios</h4>
            </div>

            <div class="col-12 ">
                <div class="row  justify-content-between">
                    <div class="col-12 col-md-auto mt-2 align-self-center">

                    </div>
                    <div class="col-12 col-md-3  mt-2  align-self-center">
                        @if ($search !='')
                        <div class="alert text-center alert-dismissible fade show m-0 py-0 text-primary" role="alert">
                            Borrar filtros
                            <button type="button " class="close " data-dismiss="alert" aria-label="Close" wire:click="clearSearch()">
                                <span class="text-danger" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>
                    <div class="col-12   col-md-5 mt-2 align-self-center">
                        <div class="input-group no-border">
                            <input type="text" class="form-control" placeholder="Buscar por comentario, nombre, email, etc." wire:model="search">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row ">
            @if (isset($comments) && $comments->count() > 0)
            <div class="col ">
                <div class="card">
                    <div class="table-responsive  p-md-4 " id="users-table">

                        <table id="datatable" class="table table-striped table-bordered " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col" style="cursor:pointer" wire:click="setSort('name')">Nombre
                                        @if($sortField=='name')
                                        @if($sortDirection=='asc')
                                        <i class="fa-solid fa-arrow-down-a-z"></i>
                                        @else
                                        <i class="fa-solid fa-arrow-up-z-a"></i>
                                        @endif
                                        @else
                                        <i class="fa-solid fa-sort mr-1"></i>
                                        @endif
                                    </th>
                                    <th scope="col" style="cursor:pointer" wire:click="setSort('status')">Aprobado
                                        @if($sortField=='status')
                                        @if($sortDirection=='asc')
                                        <i class="fa-solid fa-arrow-down-a-z"></i>
                                        @else
                                        <i class="fa-solid fa-arrow-up-z-a"></i>
                                        @endif
                                        @else
                                        <i class="fa-solid fa-sort mr-1"></i>
                                        @endif
                                    </th>
                                    <th scope="col" style="cursor:pointer" wire:click="setSort('best')">Mejores
                                        @if($sortField=='best')
                                        @if($sortDirection=='asc')
                                        <i class="fa-solid fa-arrow-down-a-z"></i>
                                        @else
                                        <i class="fa-solid fa-arrow-up-z-a"></i>
                                        @endif
                                        @else
                                        <i class="fa-solid fa-sort mr-1"></i>
                                        @endif
                                    </th>
                                    <th scope="col" style="cursor:pointer" wire:click="setSort('comment')">Comentario
                                        @if($sortField=='comment')
                                        @if($sortDirection=='asc')
                                        <i class="fa-solid fa-arrow-down-a-z"></i>
                                        @else
                                        <i class="fa-solid fa-arrow-up-z-a"></i>
                                        @endif
                                        @else
                                        <i class="fa-solid fa-sort mr-1"></i>
                                        @endif
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                <tr>
                                    <td class="d-flex align-items-center">
                                        @if(isset($comment->picture))
                                        <img class="avatar border-gray" src="{{ Storage::url($comment->picture) }}" alt="...">
                                        @else
                                        <img class="avatar border-gray" src="{{ asset('img/No Profile Picture.png') }}" alt="...">
                                        @endif
                                        <p class="ml-2">{{ $comment->name }}</p>
                                    </td>
                                    <td class="togglebutton" wire:click="changeStatusComments({{ $comment->id }}, '{{ $comment->status }}')">
                                        <label>
                                            <input type="checkbox" {{ $comment->status == 1 ? 'checked ' : '' }} name="status">
                                            <span class="toggle"></span>
                                        </label>
                                    </td>

                                    <td class="togglebutton" wire:click="changeStatusBest({{ $comment->id }}, '{{ $comment->best }}')">
                                        <label>
                                            <input type="checkbox" {{ $comment->best == 1 ? 'checked ' : '' }} name="status">
                                            <span class="toggle"></span>
                                        </label>
                                    </td>
                                    <td class="w-50">{{ $comment->comment }} </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $comments->links() }}
                </div>
            </div>

            @else
            <div class="col-12">
                <p class="alert alert-danger">⚠️ ¡Ooooups! No se encontraron resultados. Intenta cambiar la busqueda.</p>
            </div>
            @endif
        </div>
    </div>
</div>

@include('includes.alerts')