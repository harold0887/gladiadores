@extends('layouts.app', [
'class' => 'login-page',
'backgroundImagePath' => 'img/bg/fabio-mangione.jpg',
'folderActive' => '',
'elementActive' => '',
'title'=>'Mi Perfil',
'navbarClass'=>'bg-dark py-3',
'activePage'=>'perfil',



])

@section('content')
@include('includes.spinner')
<div class="content">
    <div class="container p-0">
        <div class="row ">
            <div class="col-12">
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

                            <div class="row justify-content-between">
                                <div class="col-6 col-lg-4 ">
                                    <h5>{{ $membresias->count()}}</h5>

                                    <p>Suscripciones</p>

                                </div>


                                <div class="col-6 col-lg-4 ">
                                    <h5>{{ $membresiasActive->count()}} </h5>

                                    <p>Vigente</p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
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


                                    <th scope="col">Status</th>
                                    <th scope="col">Inicio</th>
                                    <th scope="col">Fin</th>
                              
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

</div>
</div>
@endsection
@include('includes.alerts')