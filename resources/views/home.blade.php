@extends('layouts.app', [
'class' => 'login-page',
'backgroundImagePath' => 'img/bg/fabio-mangione.jpg',
'folderActive' => '',
'elementActive' => '',
'title'=>'Inicio',
'navbarClass'=>'bg-dark py-3',
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
    <div class="row">
        <div class="col-12 p-0">
            <div class="text-center">
                <h2 class="pt-5  lg:text-4xl lg:pt-12 md:text-3xl md:font-bold text-center  text-2xl " style="font-size:27px;font-weight:700; color:#4d4d4d">
                    ¿Qué dicen los suscriptores?
                </h2>
                <p class="text-center  mt-2 text-sm md:text-lg " style="color:#4d4d4d">
                    <strong> ¿Aún no estás convencid@? </strong>

                </p>
                <p style="color:#4d4d4d">
                    Mira lo que lo que piensan los suscriptores de nuestros entrenamientos.
                </p>
            </div>
        </div>
    </div>
    <div class="coments-autoplay border m-0">
        @if (isset($comments) && $comments->count() > 0)
        @foreach ($comments as $comment)
        <div class="px-2">
            <div class="card card-testimonial ">
                <div class="card-body ">
                    <div class="icon icon-primary">
                        <i class="fa fa-quote-right"></i>
                    </div>
                    <p class="card-description">
                        {{$comment->comment}}
                    </p>
                </div>
                <div class="card-footer ">
                    <h4 class="card-title text-primary">{{$comment->user->name}}</h4>
                    <h6 class="card-category">@ {{$comment->user->nickname}}</h6>
                    <div class="card-avatar d-flex justify-content-center">

                        <img class="img" src="{{ asset('img/faces/joe-gardner-2.jpg') }}">

                    </div>
                </div>
            </div>
        </div>

        @endforeach
        @endif



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