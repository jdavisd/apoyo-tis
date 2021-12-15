<div>
    <div class=row>

        <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#openPaymentCreate" >
            Adicionar
        </button>
        <div wire:ignore.self class="modal fade"  wire:mode="open" id="openPaymentCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <label >Fecha</label>
                                <input type="date" class="form-control"  wire:model="dueDate" name="dueDate"></input>
                                @error('dueDate') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label >Porcentaje</label>
                                <input type="number" min="1" max="100"class="form-control"  wire:model="percentage" name="percentage"></input>
                                @error('percentage') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label >Costo</label>
                                <input type="number"  class="form-control"  wire:model="amount" name="amount"></input>
                                @error('amount') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label >Entregable</label>
                                <textarea class="form-control"  wire:model="description" name="description"></textarea>
                                @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                        <button type="button" wire:click="store()" class="btn btn-primary close-modal" data-dismiss="modal">Guardar</button>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
     livewire.on('noPermitPayment' ,() =>{
       Swal.fire({
   icon: 'error',
   title: 'No pudes editar la empresa',
   text: 'El plazo de cambios se vencio', 
 })
     })
   </script>   
    <script>
        livewire.on('createAlert',  ()=>{   
         Swal.fire({
           icon: 'success',
           title: 'El pago ha sido creado',
           showConfirmButton: false,
           timer: 1500
         })
          })  
   </script>
</div>
