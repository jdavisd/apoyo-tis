<div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
        Adicionar
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade"  wire:mode="open" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adiccionar propuesta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
               <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Asunto</label>
                            <textarea type="" class="form-control" id="exampleFormControlInput1"  rows="3" placeholder="Ingrese detalles" wire:model="details" name="details">
                                </textarea>
                            
                            @error('details') <span class="text-danger error">{{ $message }}</span>@enderror
                        
                        </div>
                      
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Entregables</label>
                            <input type="file" class="form-control" id="exampleFormControlInput2" wire:model="deliveries"  name="deliveries" accept="application/pdf">
                            @error('deliveries') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal" data-dismiss="modal">Agregar</button>
                </div>
            </div>

        </div>

    </div>
    @livewireScripts
</div>
