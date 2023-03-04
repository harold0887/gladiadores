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

    <div class="lazy ">
        <div class="col-12  img-carousel" style="background-image: url(&quot; {{ asset('img/main/main2.jpg') }} &quot;); ">
            <div class="carousel-caption">
                <h1 class="font-weight-bold  title-caption">CLASES DE BOX A LA MEDIDA</h1>
                <p class="">¡Toma tu clase muestra sin costo!</p>
                <h4 class="font-weight-bold ">Comienza desde $750 MXN al mes</h4>
                <a class="btn btn-outline-warning btn-lg" href="{{route('memberships')}}">
                    VER PLANES
                </a>

            </div>
        </div>
        <div class="col-12  img-carousel" style="background-image: url(&quot; {{ asset('img/main/main.jpg') }} &quot;); ">

        </div>

        <div class="col-12  img-carousel" style="background-image: url(&quot; {{ asset('img/main/main3.jpg') }} &quot;); ">

        </div>

    </div>

    <div class="container-fluid">

    <div class="row">
        
    </div>




        <div class="row border">
            <div class="col-12 col-lg-6 couch" style="background-image: url(&quot; {{ asset('img/coach/coach.jpg') }} &quot;); "></div>

            <div class=" col-12 col-lg-6 text-center text-lg-left">
                <h4 class="card-title text-primary">La bestia</h4>
                <h6 class="card-category">Couch</h6>
                <p>
                    Entrenador certificado y reconocido por apoyar al talento de Quintana Roo.
                </p>
            </div>


        </div>

        <div class="row border mt-5 mt-lg-0">
            <div class="order-2 order-lg-1 col-12 col-lg-6 text-center text-lg-right border">
                <h4 class="card-title text-primary">Taurino el mono</h4>
                <h6 class="card-category">Couch</h6>
                <p>
                    Entrenador certificado por fumar mariguana en el GYM.
                </p>
            </div>
            <div class="order-1 order-lg-2 col-12 col-lg-6 couch" style="background-image: url(&quot; {{ asset('img/coach/coach1.jpg') }} &quot;); "></div>


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