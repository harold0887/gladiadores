<div class="content">
    <div class="row p-2">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa-solid fa-users text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-title">{{$users->count()}}
                                <p>
                                <p class="card-category">Usuarios</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer " style="height: 75px;">
                    <hr>
                    <div class="stats d-flex align-items-center" wire:click="$refresh()" style="cursor:pointer">
                        <i class="fa fa-refresh"></i> Actualizar ahora
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-credit-card text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-title">{{$active->count()}}
                                <p>
                                <p class="card-category">Suscripciones Active</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer " style="height: 75px;">
                    <hr>
                    <div class="stats">
                        <select class="form-control" wire:model="membresiaSelect">
                            <option value=3>Todas</option>
                            @foreach($membresias as $membresia)
                            <option value="{{$membresia->id}}"> {{$membresia->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-money-coins text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Ingresos</p>
                                <p class="card-title">$ {{$ingresos}}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer " style="height: 75px;">
                    <hr>
                    <div class="row">

                        <div class="col-6 ">
                            <select class="form-control" wire:model="month">
                                <option value="01">Enero</option>
                                <option value="02">Febrero</option>
                                <option value="03">Marzo</option>
                                <option value="04">April</option>
                                <option value="05">Mayo</option>
                                <option value="06">Junio</option>
                                <option value="07">Julio</option>
                                <option value="08">Agosto</option>
                                <option value="09">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>
                        <div class="col-6 text-right">
                            <select class="form-control" wire:model="year">
                                @for ($i = 2022; $i < 2030; $i++) <option value="{{$i}}"> {{$i}} </option>
                                    @endfor
                            </select>
                        </div>
                    </div>



                </div>
            </div>
        </div>


    </div>

    <div class="row ">

        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <div class="card-text">
                        <h4 class="card-title">Suscripciones proximas a vencer.</h4>
                        <p class="text-muted">Se muestran los siguientes
                            <select wire:model="dias">
                                <option value="10" selected>10 días</option>
                                <option value="20" selected>20 días</option>
                                <option value="30" selected>30 días</option>
                                <option value="365" selected>365 días</option>
                            </select>
                        </p>
                    </div>
                </div>
                @if (isset($proximos) && $proximos->count() > 0)
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-primary">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Vencimiento</th>
                                <th scope="col">cantidad</th>
                                <th scope="col">Suscripción</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($proximos as $proximo)
                            <tr>
                                <td class="w-25">{{ $proximo->user->name }}</td>
                                <td>{{ (new DateTime($proximo->fin))->format('d-M-Y') }}</td>
                                <td>${{ $proximo->amount }}</td>
                                <td>{{ $proximo->membresia->name }}</td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
                @else
                <div class="col-12">
                    <p class="alert alert-danger">⚠️ ¡Ooooups! No se encontraron resultados.</p>
                </div>
                @endif
            </div>

        </div>





    </div>



</div>