<div class="content">
    <div class="container-fluid mt--6  ">
        <div class="row m-0">
            <div class="col-12 border-bottom ">
                <h4 class="m-0  text-center">{{ __('Users') }}</h4>
            </div>

            <div class="col-12 ">
                <div class="row  justify-content-between">
                    <div class="col-12 col-md-auto mt-2 align-self-center">
                        <a class="btn  btn-block  btn-outline-primary " href="{{ route('users.create') }}">
                            <i class="fa-solid fa-plus"></i>
                            <span>Agregar usuario</span>
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
            @if (isset($users) && $users->count() > 0)
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
                                @foreach ($users as $user)
                                @php
                                $vcountSuccess= 0;
                                $vcountpending=0
                                @endphp
                                @if(!empty($user->orders))

                                @foreach($user->orders as $v)

                                @if($v->status_id ==1)
                                @php
                                $vcountpending++;
                                @endphp
                                @elseif($v->status_id ==2))
                                @php
                                $vcountSuccess++;
                                @endphp
                                @endif
                                @endforeach
                                @endif



                                <tr class="{{$vcountSuccess > 0 ? 'table-success' : ''}} {{$vcountpending > 0 ? 'table-warning' : ''}}">


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

                                    <td>
                                        {{ $user->created_by }}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('users.show',$user->id) }}" class="btn btn-info btn-link btn-icon btn-sm edit "><i class="material-icons">visibilitys</i></a>
                                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-info btn-link btn-icon btn-sm edit "><i class="material-icons">edit</i></a>

                                            <form method="post" action="{{ route('users.destroy', $user->id) }} ">
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
