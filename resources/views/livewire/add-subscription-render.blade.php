<div wire:ignore.self class="modal fade" id="modal-add-subscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Agregar suscripción {{$membershipSelect}}
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
                                <option value="" disabled selected>Selecciona un usuario...</option>
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

                    <div class="col-12  mt-2 text-center">
                        <button type="submit" class="btn btn-primary " {{$membershipSelect==''?'disabled':''}}>Agregar suscripción</button>
                    </div>
                </form>





            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal" wire:click="$set('membershipSelect', '')">Cerrar</button>

            </div>
        </div>
    </div>


</div>
