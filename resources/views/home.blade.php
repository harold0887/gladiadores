@extends('layouts.app', [
'class' => 'login-page',
'backgroundImagePath' => 'img/bg/fabio-mangione.jpg',
'folderActive' => '',
'elementActive' => '',
'title'=>'Inicio',
'navbarClass'=>'bg-dark',
'activePage'=>'home',
])

@section('content')

<div class="content">
    <div class="container-fluid">
        
    <div class="row">
    <div class="col-md-12">

    </div>
        <div class="col-md-4">
            <div class="card card-login card-hidden mb-3">
                <div class="card-header card-header-primary text-center">
                    <h4>Inicio</h4>
                </div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-login card-hidden mb-3">
                <div class="card-header card-header-primary text-center">
                    <h4>Inicio</h4>
                </div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-login card-hidden mb-3">
                <div class="card-header card-header-primary text-center">
                    <h4>Inicio</h4>
                </div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-login card-hidden mb-3">
                <div class="card-header card-header-primary text-center">
                    <h4>Inicio</h4>
                </div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-login card-hidden mb-3">
                <div class="card-header card-header-primary text-center">
                    <h4>Inicio</h4>
                </div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
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