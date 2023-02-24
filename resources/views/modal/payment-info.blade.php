<div wire:ignore.self class="modal fade" id="payment-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">

                    @php
                    $name = explode(" ", Auth::user()->name);
                    echo '¡'.$name[0].'! Finaliza el pago de tu suscripción.' ;
                    @endphp

                </h4>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card border">
                            <div class="card-body text-muted">
                                <h4 class="text-primary text-center m-0">Paga ${{number_format($price,2)}} con tranferencia o deposito</h4>

                                <hr>
                                <h5>Datos para tranferencia o deposito</h5>
                                <ul>
                                    <li>Número de tarjeta: <span class="h6">4152 3134 4548 6602</span></li>

                                    <li>Pago directo en gimnasio.</li>
                                </ul>
                                <small class="text-danger">
                                    Nota: te enviaremos un email con esta información.
                                </small>
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
                            <div class="card-footer text-center justify-content-center">
                                <button class="btn btn-primary btn-round " wire:click="adSubscriptions()">
                                    FINALIZAR INSCRIPCION
                                </button>

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
            <div class="modal-footer">

                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>


</div>