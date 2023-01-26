
<div class="content">
@include('modal.add-admin')
    <div class="container-fluid mt--6  ">
    
        <div class="row m-0">
            <div class="col-12 border-bottom ">
                <h4 class="m-0  text-center">{{ __('Users') }}</h4>
            </div>

            <div class="col-12 ">
                <div class="row  justify-content-between">
                    <div class="col-12 col-md-auto mt-2 align-self-center">
                        <a class="btn  btn-block  btn-outline-primary " data-toggle="modal" data-target="#modal-add-admin">
                            <i class="fa-solid fa-plus"></i>
                            <span>Agregar administrador</span>
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
                            <input type="text" class="form-control" placeholder="Buscar por nombre, email, teléfono o alias..." wire:model="search">
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
            @if (isset($administradores) && $administradores->count() > 0)
            <div class="col ">
                <div class="card">


                    <div class="col-12 ">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>

                    <div class="table-responsive  p-md-4 " id="users-table">

                        <table id="datatable" class="table table-striped table-bordered " cellspacing="0" width="100%">
                            <thead>
                                <tr>

                                    <th scope="col">{{ __('Photo') }}</th>
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
                                    <th scope="col" style="cursor:pointer" wire:click="setSort('email')">{{ __('Email') }}
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
                                    <th scope="col">{{ __('Phone') }}</th>
                                    <th scope="col">Alias</th>

                                    <th scope="col">{{ __('Create by') }}</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($administradores as $user)

                                <tr>

                                    <td class="px-1 py-0 rounded">
                                        <span class="avatar avatar-sm rounded-circle">
                                            @if($user->picture !=null)
                                            <img class="avatar-md border-gray m-0" src="{{ Storage::url($user->picture) }}" alt="...">
                                            @else
                                            <img class="avatar-md border-gray m-0" src="{{ asset('img/No Profile Picture.png') }}" alt="...">
                                            @endif
                                        </span>
                                    </td>
                                    <td>{{ $user->name }}</td>

                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->phone }}
                                    </td>
                                    <td>
                                        {{ $user->nickname }}
                                    </td>
                                    <!-- <td>
                                        @if(!empty($user->roles()->get()))
                                        @foreach($user->getRoleNames() as $v)
                                        <label class="badge badge-primary text-white btn-link">{{ $v }}</label>
                                        <br>
                                        @endforeach
                                        @endif
                                    </td> -->
                                    <td>
                                        {{ $user->created_by }}
                                    </td>
                                    <td class="text-center">

                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="nc-icon nc-bullet-list-67"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                <a class="dropdown-item p-0 " style="cursor: pointer;" wire:click="removeAdminConfirm('{{$user->id}}','{{$user->name}}')">
                                                    <button class="btn btn-icon  text-danger p-0 btn-link">
                                                        <span class=" btn-inner--icon"><i class="material-icons">close</i></span>
                                                    </button>
                                                    <span class="mx-3">Remover permisos de administrador</span>
                                                </a>



                                            </div>
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