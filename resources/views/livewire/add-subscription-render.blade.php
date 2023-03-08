<div wire:ignore.self class="modal fade" id="modal-add-subscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Agregar suscripción
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="$set('membershipSelect', '')">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body px-3">


                <form wire:submit.prevent="submit()">
                    <div class="row justify-content-center">
                        <div class="form-group col-12 col-md-10">
                            <label for="note">Seleccione un suscripción para asignar al usuario.</label>

                            <select id="membershipSelect" class="form-control {{ $errors->has('membershipSelect') ? ' is-invalid border-danger' : '' }} " data-style="btn-ouline-primary" data-live-search="true" wire:model="membershipSelect">
                                <option value="" disabled selected>Selecciona una opcion...</option>
                                @if (isset($membresias) && $membresias->count() > 0)
                                @foreach ($membresias as $membresia)
                                <option value="{{$membresia->id}}">{{$membresia->name}} - {{$membresia->price_with_discount}}</option>
                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('membershipSelect'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('membershipSelect') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">

                        <div class="form-group col-12 col-md-10">
                            <label for="note">Tipo de suscripcion.</label>
                            <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input " type="radio" wire:model="type" value="auto"> Automatica: Inicia con la fecha de hoy.
                                    <span class="form-check-sign {{ $errors->has('type') ? 'text-danger' : '' }}"></span>
                                </label>
                            </div>
                            <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" wire:model="type" value="manual"> Manual: Debe seleccionar la fecha de inicio.
                                    <span class="form-check-sign {{ $errors->has('type') ? 'text-danger' : '' }}"></span>
                                </label>
                                @if ($errors->has('type'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

        

                    @if($type=="manual")
                    <div class="row justify-content-center" >

                        <div class="form-group col-12 col-md-10">
                            <label for="note">Seleccione la fecha de inicio para esta suscripcion.</label>
                            <input id="dateMembership" type="date" class="form-control datepicker" wire:model="date">

                            @if ($errors->has('date'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    @endif


             

                    <div class="col-12  mt-2 text-center">
                        <button type="submit" class="btn btn-primary ">Agregar suscripción</button>
                    </div>
                </form>





            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal" wire:click="$set('membershipSelect', '')">Cerrar</button>

            </div>
        </div>
    </div>


</div>