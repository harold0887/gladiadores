@extends('layouts.app',[
'class' => '',
'folderActive' => '',
'elementActive' => 'dashboard',
'title'=>'Dashboard',
'navbarClass'=>'navbar-transparent',
'activePage'=>'dashboard',
])

@section('content')
<div class="content">
    <div class="row">
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
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Update Now
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
                                <i class="nc-icon nc-vector text-danger"></i>
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
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i> In the last hour
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
                                <p class="card-title">$ 1,345
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-calendar-o"></i> Last day
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
                        <p class="text-muted">Se muestran los siguientes 10 dias</p>
                    </div>
                </div>
                @if (isset($proximos) && $proximos->count() > 0)
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-primary">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">cantidad</th>
                                <th scope="col">Suscripción</th>
                            </tr>
                        </thead>
                       
                        <tbody>

                            @foreach($proximos as $proximo)
                            <tr>
                                <td>{{ $proximo->user->name }}</td>
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
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
        demo.initVectorMap();
    });
</script>
@endpush