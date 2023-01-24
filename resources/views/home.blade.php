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
<div class="container-fluid" style="height: auto; color: black; background-color: #F4F3EF !important; margin-top:64px">
    <div class="row my-5 pb-5 justify-content-center  bg-white shadow rounded shadow-lg">


        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/bg/box6.jpg') }}" class="d-block w-100 d-image" alt="...">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="mt-5 fs-3 text-uppercase">Some representative placeholder content for the third slide.</p>
                        <h1 class="display-1 fw-bolder text-capitalize">
                            Slide 1
                        </h1>
                        <button class="btn btn-primary px-4 py-2 fs-5 mt-5">
                            Informacion
                        </button>
                    </div>
                </div>
                <div class="carousel-item active">
                    <img src="{{ asset('img/bg/box4.jpg') }}" class="d-block w-100 d-image" alt="...">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="mt-5 fs-3 text-uppercase">Some representative placeholder content for the third slide.</p>
                        <h1 class="display-1 fw-bolder text-capitalize">
                            Slide 1
                        </h1>
                        <button class="btn btn-primary px-4 py-2 fs-5 mt-5">
                            Informacion
                        </button>
                    </div>
                </div>


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

</div>
@include('includes.alerts')

@endsection
