<div class="content p-0">
    <div class="container-fluid mt--6  ">
        <div class="row m-0">
          

            <div class="col-12 col-md-9">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('img/bg/damir-bosnjak.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author ">


                            @if(isset($user->picture))
                            <img class="avatar border-gray" src="{{ Storage::url($user->picture) }}" alt="...">
                            @else
                            <img class="avatar border-gray" src="{{ asset('img/No Profile Picture.png') }}" alt="...">
                            @endif

                            <h5 class="title text-primary">{{$user->name}}</h5>

                            <p class="description">
                                @ {{$user->nickname}}
                            </p>
                            <!-- @if($user->renovacion==1)
                            <button class="btn btn-outline-primary btn-sm" wire:click="changeStatus()">
                                cancelar suscripción
                            </button>
                            @endif -->
                        </div>

                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="button-container">
                            <div class="row justify-content-between">
                                <div class="col-12 col-lg-4 ">
                                    <h5>{{ $membresias->count()}}</h5>

                                    <p>Membresias</p>

                                </div>
                                <!-- <div class="col-12 col-lg-4 ">

                                    @if($user->renovacion==1)
                                    <input class="bootstrap-switch" type="checkbox" data-toggle="switch" checked data-on-label="<i class='nc-icon nc-check-2'></i>" data-off-label="<i class='nc-icon nc-simple-remove'></i>" data-on-color="success" data-off-color="success" disabled />
                                    @else
                                    <input class="bootstrap-switch" type="checkbox" data-toggle="switch" data-on-label="<i class='nc-icon nc-check-2'></i>" data-off-label="<i class='nc-icon nc-simple-remove'></i>" data-on-color="success" data-off-color="success" disabled />
                                    @endif


                                    <p>Renovacion automatica</p>
                                </div> -->

                                <div class="col-12 col-lg-4 ">
                                    <h5>{{ $membresiasActive->count()}} </h5>

                                    <p>Vigente</p>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-3 mt-2 ">
                <div class="row">

                    @if(isset($lastMembership) && $lastMembership->count() > 0)
                    <div class="col-12 text-center">
                        <h5>Última suscripción</h5>
                        <h6>Status: @if($lastMembership->status_id==1)
                            <span class="text-warning"> Pendiente</span>
                            @elseif($lastMembership->status_id==2)
                            <span class="text-success">Pagada</span>
                            @elseif($lastMembership->status_id==3)
                            <span class="text-danger">Cancelada</span>
                            @elseif($lastMembership->status_id==4)
                            <span class="text-danger">Expirada</span>
                            @endif

                        </h6>
                        <h6>Vencimiento: {{(new DateTime($lastMembership->fin))->format('d-M-Y')}}</h6>

                    </div>
                    @endif


                    <div class="col-12 text-center justifi-content-center">
                        <button class="btn  btn-block  btn-primary  " data-toggle="modal" data-target="#modal-add-subscription" {{ $membresiasActive->count() >0 ? 'disabled': ''}}>
                            <i class="fa-solid fa-plus"></i>
                            <span>Agregar suscripción</span>
                        </button>

                    </div>
                </div>
            </div>


        </div>
        <div class="row  m-0">
            @if (isset($membresias) && $membresias->count() > 0)
            <div class="col-12 p-0 p-md-2">

                <div class="card">
                    <div class="card-header">
                        <div class="card-text">
                            <h4 class="card-title">Suscripciones del usuario.</h4>

                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-primary">
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
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($membresias as $user)
                                <tr>

                                    <td>{{ $user->membresia->name }}</td>

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
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-outline-primary btn-icon-only text-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                @if($user->status_id==1)
                                                <a class="dropdown-item" style="cursor:pointer" wire:click="updatePayment('{{ $user->id }}')">Confirmar pago</a>
                                                
                                             

                                                @endif

                                                <a class="dropdown-item" style="cursor:pointer" wire:click="ConfirmCancelOrder('{{ $user->id }}')">Cancelar</a>



                                            </div>
                                        </div>
                                    </td>
                                    <!-- <td class="text-center">
                                        <div class="btn-group">

                                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-info btn-link btn-icon btn-sm edit "><i class="material-icons">edit</i></a>

                                            <form method="post" action="{{ route('users.destroy', $user->id) }} ">
                                                <button class=" btn btn-danger btn-link btn-icon btn-sm remove show-alert-delete-user">
                                                    @csrf
                                                    @method('DELETE')
                                                    <i class="material-icons ">close</i>
                                                </button>
                                            </form>
                                        </div>

                                    </td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            @else
            <div class="col-12">
                <p class="alert alert-warning text-dark">⚠️ ¡Ooooups! Este usuario no tiene ninguna suscripción activa.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@include('includes.alerts')