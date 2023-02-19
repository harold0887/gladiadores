@extends('layouts.app', [
'class' => 'login-page',
'backgroundImagePath' => '',
'folderActive' => '',
'elementActive' => '',
'title'=>'Contacto',
'navbarClass'=>'bg-dark py-3',
'activePage'=>'contacto',
])

@section('content')

<div class="content">
    <div class="container p-0">

    
        <div class="row justify-content-center">

            <div class="col-12   text-center">
                <h2 class="font-serif lg:text-2xl lg:pt-12 md:text-3xl md:font-bold text-center text-2xl text-primary mb-3">
                    Contáctanos en WhatsApp
                </h2>
                <p class="text-center text-gray-1000 mt-0 text-base md:text-base">
                    Envianos un mensaje, solo da click en el logo de WhatsApp
                </p>
                <a href="" target="_blank">
                    <i class="fa-brands fa-whatsapp fa-5x"></i>
                </a>

            </div>







        </div>
    </div>

</div>




@endsection
