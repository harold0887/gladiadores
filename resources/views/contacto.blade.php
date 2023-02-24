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
            <!-- <div class="col-6">

                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Contacto</h4>
                    </div>
                    <div class="card-body ">
                        <form class="form-horizontal">
                            <div class="row">
                                <label class="col-md-3 col-form-label">Nombre</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nombre...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Email</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Asunto</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Asunto...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Mensaje</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <textarea type="text" class="form-control border rounded @error('message')border-danger @enderror " rows="5" placeholder="Mensaje..."></textarea>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer ">
                        <div class="row">
                            <label class="col-md-3"></label>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-info btn-round">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="col-12   text-center">
                <h4 class="text-primary">
                    Contáctanos en WhatsApp
                </h4>
                <p class="text-center text-gray-1000 mt-0 text-base md:text-base">
                    Envianos un mensaje, solo da click en el logo de WhatsApp
                </p>
                <a href="" target="_blank">
                    <i class="fa-brands fa-whatsapp fa-5x"></i>
                </a>
                <p class="mt-5">
                O envíanos un correo a 
                    <a href="mailto:contacto@labestia.com?Subject=Contacto%20en%20Pagina%20web">contacto@labestia.com</a>
                </p>

            </div>







        </div>
    </div>

</div>




@endsection