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
<div class="container pt-5 " style="height: auto; color: black; background-color: #F4F3EF !important">
    <div class="row my-5 pb-5 justify-content-center  bg-white shadow rounded shadow-lg">
        <div class="col-md-4">
            <div class="card card-login card-hidden mb-3">
                <div class="card-header card-header-primary text-center">
                    <h4 >Inicio</h4>
                </div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-login card-hidden mb-3">
                <div class="card-header card-header-primary text-center">
                    <h4 >Inicio</h4>
                </div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-login card-hidden mb-3">
                <div class="card-header card-header-primary text-center">
                    <h4 >Inicio</h4>
                </div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-login card-hidden mb-3">
                <div class="card-header card-header-primary text-center">
                    <h4 >Inicio</h4>
                </div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-login card-hidden mb-3">
                <div class="card-header card-header-primary text-center">
                    <h4 >Inicio</h4>
                </div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-login card-hidden mb-3">
                <div class="card-header card-header-primary text-center">
                    <h4 >Inicio</h4>
                </div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>

         <div class="col-md-4">
            <div class="card card-login card-hidden mb-3">
                <div class="card-header card-header-primary text-center">
                    <h4 >Inicio</h4>
                </div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>
         <div class="col-md-4">
            <div class="card card-login card-hidden mb-3">
                <div class="card-header card-header-primary text-center">
                    <h4 >Inicio</h4>
                </div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>

</div>
@include('includes.alerts')

@endsection
