<div wire:ignore.self  class="modal fade" id="modal-add-admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Administrador {{$userSelect}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                    
                <form wire.ignore   wire:submit.prevent="submit()">
                    <div class="row justify-content-center">
                        <div  class="form-group col-10">
                            <label for="note">Seleccione un usuario para asignar permisos de administrador</label>                            
                    
                            <select id="select" class="form-control {{ $errors->has('userSelect') ? ' is-invalid border-danger' : '' }} " wire:model="userSelect">
                                <option value="" disabled selected>Selecciona un usuario...</option>
                                @if (isset($users) && $users->count() > 0)
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('userSelect'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('userSelect') }}</strong>
                            </span>
                            @endif
                        </div>





                    </div>

                    <div class="col-12  mt-2 text-center">
                        <button type="submit" class="btn btn-primary " {{$userSelect==''?'disabled':''}}  >Registrar administrador</button>
                    </div>
                </form>



             

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal" wire:click="reload()">Cerrar</button>

            </div>
        </div>
    </div>



</div>