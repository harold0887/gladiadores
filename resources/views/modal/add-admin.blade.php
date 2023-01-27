<!-- Modal -->
<div wire:ignore.self class="modal fade mt-5" id="showOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="exampleModalLabel">Agregar administrador: {{$newAdministrador}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div wire:ignore class="modal-body">

            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text"  class="form-control" )  autofocus wire:model="newAdministrador">
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>