<div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
        Adicionar
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade"  wire:mode="open" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
               <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Detalles</label>
                            <textarea type="" class="form-control" id="exampleFormControlInput1"  rows="3" placeholder="Ingrese detalles" wire:model="details" name="details">
                                </textarea>
                            {{$details}}
                            @error('details') <span class="text-danger error">{{ $message }}</span>@enderror
                        
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Fecha</label>
                            <input type="date" class="form-control" id="exampleFormControlInput2" wire:model="date" name="date">
                        
                            @error('date') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Entregables</label>
                            <input type="file" class="form-control" id="exampleFormControlInput2" wire:model="deliveries"  name="deliveries">
                            @error('deliveries') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Agregar</button>
                </div>
            </div>

        </div>

    </div>
    @livewireScripts
</div>
