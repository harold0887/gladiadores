@include('modal.add-membresia')
<div class="content">

    <div class="container-fluid mt--6  ">
        <div class="row m-0">

            <div class="col-md-3 p-0 p-md-2">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('img/bg/damir-bosnjak.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                           
                                @if(isset($user->picture))
                                <img class="avatar border-gray" src="{{ Storage::url($user->picture) }}" alt="...">
                                @else
                                <img class="avatar border-gray" src="{{ asset('img/No Profile Picture.png') }}" alt="...">
                                @endif

                                <h5 class="title text-primary">{{$user->name}}</h5>
                            
                            <p class="description">
                                @ {{$user->nickname}}
                            </p>
                        </div>
                        <p class="description text-center">
                        {{$frase[0]}}
                        </p>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="button-container">
                            <div class="row">
                                <div class="col-6 ml-auto">
                                    <h5>{{ $membresias->count()}}
                                        <br>
                                        <small>Membresias</small>
                                    </h5>
                                </div>
                                <div class="col-6 ml-auto mr-auto">
                                    <h5>{{ $membresiasActive->count()}}
                                        <br>
                                        <small>Vigente</small>
                                    </h5>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-9 p-0 p-md-2 text-center" id="profile-tour">
                <div class="row m-0">
                 
        
                    <div class="col-12 ">
                        <div class="row  justify-content-between">
                            <div class="col-12 col-md-auto mt-2 align-self-center">
                                <a class="btn  btn-block  btn-outline-primary "  data-toggle="modal" data-target="#modal-add-subscription">
                                    <i class="fa-solid fa-plus"></i>
                                    <span>Agregar suscripción</span>
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
                <div class="row">
                    <div class="col">
                        <div class="card">



                            <div class="table-responsive  p-md-4 " id="users-table">
                                <table id="datatable" class="table table-striped table-bordered " cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
        
        
                                            <th scope="col">{{ __('Name') }}
        
        
                                            </th>
                                            <th scope="col">{{ __('Precio') }}
        
                                            </th>
                                            <th scope="col">Fecha de Pago</th>
                                            <th scope="col">Confirmado por</th>
        
                                            <th scope="col">{{ __('Create by') }}</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Inicio</th>
                                            <th scope="col">Fin</th>
        
                                        </tr>
                                    </thead>
        
                                    <tbody>
                                        @foreach ($membresias as $user)
        
        
        
        
                                        <tr>
        
        
        
                                            <td>{{ $user->concept }}</td>
        
                                            <td>
                                                {{ $user->amount }}
                                            </td>
                                            <td>
                                                {{$user->date_payment!= null ?  (new DateTime($user->date_payment))->format('d-M-Y'): ''}}
                                            </td>
                                            <td>
                                                {{ $user->confirmed_by }}
                                            </td>
        
                                            <td>
                                                {{ $user->created_by }}
                                            </td>
                                            <td>
                                                @if($user->status_id==1)
                                                <span class="text-warning  d-flex align-items-center">
                                                    <i class="material-icons">pending</i>
                                                    <span class=" mt-1 ml-1">Pendiente</span>
                                                </span>
                                                @elseif($user->status_id==2)
        
                                                <span class=" text-primary   d-flex align-items-center">
                                                    <i class="material-icons">check_circle</i>
                                                    <span class=" mt-1 ml-1">Pagada</span>
                                                </span>
                                                @elseif($user->status_id==3)
        
                                                <span class="text-danger d-flex align-items-center">
                                                    <i class="material-icons">cancel</i>
                                                    <span class=" mt-1 ml-1">Cancelada</span>
                                                </span>
                                                @elseif($user->status_id==4)
        
                                                <span class=" text-danger   d-flex align-items-center">
                                                    <i class="material-icons">settings_backup_restore</i>
                                                    <span class=" mt-1 ml-1">Expirada</span>
                                                </span>
        
                                                @endif
        
                                            </td>
                                            <td>
                                                {{(new DateTime($user->inicio))->format('d-M-Y')}}
                                            </td>
                                            <td>
                                                {{(new DateTime($user->fin))->format('d-M-Y')}}
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

                </div>



               

            </div>
        </div>
    </div>
</div>
@include('includes.alerts')