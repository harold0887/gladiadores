<div wire:ignore.self class="modal fade mt-5" id="addMembership" tabindex="-1" role="dialog" aria-labelledby="addMembership" aria-hidden="true">


    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="exampleModalLabel">Agregar membresia a {{$prueba}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                <input type="text" class="form-control" ) autofocus wire:model="prueba">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
