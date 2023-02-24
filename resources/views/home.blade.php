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
                <p>
                    <small id="comments-show" class="text-primary" style="cursor:pointer">Ver todos los comentarios o dejar un comentario.</small>
                </p>
            </div>
        </div>
    </div>
    <div id="comments-slick" class="coments-autoplay m-0" style="display: show">
        @if (isset($comments) && $comments->count() > 0)
        @foreach ($comments as $comment)
        <div class="px-2">
            <div class="card card-testimonial ">
                <div class="card-body ">
                    <div class="icon icon-primary">
                        <i class="fa fa-quote-right"></i>
                    </div>
                    <p class="card-description " style="height: 120px;">


                        {{Str::limit($comment->comment,200)}}
                    </p>
                </div>
                <div class="card-footer ">
                    <h4 class="card-title text-primary">

                        @php
                        $name = explode(" ", $comment->user->name);
                        echo $name[0];
                        @endphp


                    </h4>
                    <h6 class="card-category">@ {{$comment->user->nickname}}</h6>
                    <div class="card-avatar d-flex justify-content-center">

                        @if(isset($comment->user->picture))
                        <img class="img" src="{{Storage::url($comment->user->picture)}}">
                        @else
                        <img class="img" src="{{ asset('img/No Profile Picture.png') }}" alt="...">
                        @endif



                    </div>
                </div>
            </div>
        </div>

        @endforeach
        @endif
    </div>
    <div id="comments-all" style="display: none">
        <livewire:comments-render />
    </div>



</div>




@endsection