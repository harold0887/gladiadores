<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>
        {{ 'APP' }}
    </title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

     <!-- boostrap -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet">
    <!-- CSS Just for demo purpose, don't include it in your project -->

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body>

    <div class="wrapper ">

        <div class="container">
            <div class="row justify-content-center">
                <h4 class="text-center">
                    ¡{{$userName}}! Finaliza el pago de tu suscripción.
                </h4>
                <div class="col-12 p-5">
                    <div class="card border">
                        <div class="card-body text-muted">
                            <h4 class="text-primary text-center m-0">Paga ${{number_format($price,2)}} con tranferencia o deposito</h4>

                            <hr>
                            <h5>Datos para tranferencia o deposito</h5>
                            <ul>
                                <li>Número de tarjeta: <span class="h6">4152 3134 4548 6602</span></li>

                                <li>Pago directo en gimnasio.</li>
                            </ul>

                            <hr>
                            <h5 class="mt-5">Resumen.</h5>
                            <table class="table ">
                                <tr>
                                    <td class="p-1">
                                        <i class="fa-solid fa-trophy"></i>
                                    </td>
                                    <td class="p-1 text-muted" colspan="2">
                                        {!!$type!!}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-1">
                                        <i class="fa fa-calendar-o"></i>

                                    </td>
                                    <td class="p-1 text-muted">
                                        Inicio: {{$inicio}}

                                    </td>
                                    <td class="p-1 text-muted">
                                        Fin: {{$fin}}

                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-1">
                                        <i class="fa-solid fa-money-bill"></i>

                                    </td>
                                    <td class="p-1 text-muted">
                                        ${{number_format($price,2)}} mxn

                                    </td>
                                    <td>
                                        <span class="text-warning">Pago pendiente</span>
                                    </td>
                                </tr>

                            </table>
                        </div>

                        <div class=" justify-content-center text-center">
                            <small>
                                Si tiene alguna pregunta, no dude en contactarme. Solo da click en el logo de WhatsApp
                            </small>
                            <br>
                            <a href="" target="_blank">
                                <i class="fa-brands fa-whatsapp fa-5x"></i>
                            </a>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        @include('includes.footer-simple')

    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('/demo/demo.js') }}"></script>

    <!-- iconos awesome -->
    <script src="https://kit.fontawesome.com/58c5330fd0.js" crossorigin="anonymous"></script>

    @stack('scripts')

</body>

</html>