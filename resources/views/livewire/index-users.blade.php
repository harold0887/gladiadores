<div class="content">
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-12 border-bottom ">
                <h4 class="m-0  text-center">{{ __('Users') }}</h4>
            </div>

            <div class="col-12 ">
                <div class="row  justify-content-between">
                    <div class="col-12 col-md-3 mt-2 align-self-center">
                        <a class="btn  btn-block  btn-outline-primary " href="{{ route('users.create') }}">
                            <span>Nuevo usuario</span>
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
                            <input type="text" class="form-control" placeholder="{{ __('Search') }}..." wire:model="search">
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
        <div class="row">
            <div class="col">
                <div class="card">


                    <div class="col-12 ">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>
                    @if (isset($users) && $users->count() > 0)
                    <div class="table-responsive py-4" id="users-table">

                        <table id="datatable" class="table table-striped table-bordered " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Photo') }}</th>
                                    <th scope="col" style="cursor:pointer" wire:click="setSort('name')">{{ __('Name') }}</th>
                                    <th scope="col" style="cursor:pointer" wire:click="setSort('email')">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Phone') }}</th>
                                    <th scope="col">{{ __('Role') }}</th>
                                    <th scope="col">{{ __('Create by') }}</th>
                                    <th scope="col">Acciones</th>

                                    <th scope="col"></th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)

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
                                        @if(!empty($user->roles()->get()))
                                        @foreach($user->getRoleNames() as $v)
                                        <label class="badge badge-primary text-white btn-link">{{ $v }}</label>
                                        <br>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        {{ $user->created_by }}
                                    </td>
                                    <td class="text-right ">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-info btn-link btn-icon btn-sm like"><i class="fa fa-heart"></i></a>
                                            <a href="#" class="btn btn-warning btn-link btn-icon btn-sm edit"><i class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger btn-link btn-icon btn-sm remove"><i class="fa fa-times"></i></a>
                                        </div>

                                    </td>
                                </tr>

                                @endforeach



                            </tbody>
                        </table>
                        @else
        <div class="col-12">
            <p class="alert alert-danger">⚠️ ¡Ooooups! No se encontraron resultados.</p>
        </div>
        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>