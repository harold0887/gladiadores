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

                    @auth
                    @php
                    $name = explode(" ", Auth::user()->name);
                    echo '¡'.$name[0].'! Finaliza el pago de tu suscripción.' ;
                    @endphp
                    @endauth
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
                                <h5>Resumen.</h5>
                                <table class="table ">
                                    <tr>
                                        <td class="p-1 text-center">
                                            <i class="fa-solid fa-trophy  fa-2x"></i>
                                        </td>
                                        <td class="p-1 text-muted font-weight-bold" colspan="2">
                                            {!!$type!!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-1 text-center">
                                            <i class="fa fa-calendar-o  fa-2x"></i>

                                        </td>
                                        <td class="p-1 text-muted">
                                            <span class="font-weight-bold">Inicio:</span> {{$inicio}}

                                        </td>
                                        <td class="p-1 text-muted">
                                            <span class="font-weight-bold">Fin:</span> {{$fin}}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-1 text-center">
                                            <i class="fa-solid fa-money-bill  fa-2x"></i>

                                        </td>
                                        <td class="p-1 text-muted">
                                            ${{number_format($price,2)}} mxn

                                        </td>
                                        <td>
                                            <span class="text-warning font-weight-bold">Pago pendiente</span>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                            <div class="card-footer text-center justify-content-center">
                                <button class="btn btn-primary btn-round " wire:click="adSubscriptions()" wire:loading.remove>
                                    FINALIZAR INSCRIPCION
                                </button>
                                <button class="btn btn-primary btn-round" type="button" disabled wire:loading>
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>

                            </div>
                            <div class=" justify-content-center text-center mt-5">
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