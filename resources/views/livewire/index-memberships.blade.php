<div class="content">
    <div class="container-fluid mt--6  ">
        <div class="row m-0">
            <div class="col-12 border-bottom ">
                <h4 class="m-0  text-center">Membresias</h4>
            </div>

            <div class="col-12 ">
                <div class="row  justify-content-between">
                    <div class="col-12 col-md-auto mt-2 align-self-center">
                        <a class="btn  btn-block  btn-outline-primary " href="{{ route('users.create') }}">
                            <i class="fa-solid fa-plus"></i>
                            <span>Agregar membresia</span>
                        </a>
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
                            <input type="text" class="form-control" placeholder="Buscar por nombre..." wire:model="search">
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
            @if (isset($memberships) && $memberships->count() > 0)
            <div class="col ">
                <div class="card">
                    <div class="table-responsive  p-md-4 " id="users-table">

                        <table id="datatable" class="table table-striped table-bordered " cellspacing="0" width="100%">
                            <thead>
                                <tr>


                                    <th scope="col" style="cursor:pointer" wire:click="setSort('name')">{{ __('Name') }}
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
                                    <th scope="col">Frecuencia</th>
                                    <th scope="col" style="cursor:pointer" wire:click="setSort('email')">Precio
                                        @if($sortField=='email')
                                        @if($sortDirection=='asc')
                                        <i class="fa-solid fa-arrow-down-a-z"></i>
                                        @else
                                        <i class="fa-solid fa-arrow-up-z-a"></i>
                                        @endif
                                        @else
                                        <i class="fa-solid fa-sort mr-1"></i>
                                        @endif
                                    </th>
                                    <th scope="col">Descuento</th>
                                    <th scope="col">Precio con descuento</th>

                                    <th scope="col">Visible</th>
                                    <th scope="col">Principal</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($memberships as $membership)

                                <tr>


                                    <td>{{ $membership->name }}</td>
                                    <td>{{ $membership->frecuencia }}</td>

                                    <td>
                                        {{ $membership->price }}
                                    </td>
                                    <td>
                                        {{ $membership->discount }}
                                    </td>
                                    <td>
                                        {{ $membership->price_with_discount }}
                                    </td>
                                    <td>
                                        @if ($membership->status == 1)
                                        <input wire:click="changeStatus({{ $membership->id }}, '{{ $membership->status }}')"  class="bootstrap-switch" type="checkbox" data-toggle="switch" checked data-on-label="<i class='nc-icon nc-check-2'></i>" data-off-label="<i class='nc-icon nc-simple-remove'></i>" data-on-color="success" data-off-color="success" />

                                        @else
                                        <input wire:click="changeStatus({{ $membership->id }}, '{{ $membership->status }}')" class="bootstrap-switch" type="checkbox" data-toggle="switch" data-on-label="<i class='nc-icon nc-check-2'></i>" data-off-label="<i class='nc-icon nc-simple-remove'></i>" data-on-color="success" data-off-color="success" />
                                        @endif
                                    </td>
                                    <td>
                                        @if ($membership->main == 1)
                                        <input class="bootstrap-switch" type="checkbox" data-toggle="switch" checked="" data-on-color="info" data-off-color="info" data-on-label="ON" data-off-label="OFF">
                                        @else
                                        <input class="bootstrap-switch" type="checkbox" data-toggle="switch" data-off-color="info" data-on-color="info" data-on-label="ON" data-off-label="OFF">
                                        @endif
                                    </td>


                                    <td class="text-center">
                                        <div class="btn-group">

                                            <a href="{{ route('users.edit',$membership->id) }}" class="btn btn-info btn-link btn-icon btn-sm edit "><i class="material-icons">edit</i></a>

                                            <form method="post" action="{{ route('users.destroy', $membership->id) }} ">
                                                <button class=" btn btn-danger btn-link btn-icon btn-sm remove show-alert-delete-user">
                                                    @csrf
                                                    @method('DELETE')
                                                    <i class="material-icons ">close</i>
                                                </button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>

                    </div>

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