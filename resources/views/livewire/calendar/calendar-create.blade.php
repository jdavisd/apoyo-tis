<div>
    <div class=row>

        <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#openCalendarCreate" >
            Adicionar
        </button>
        <div wire:ignore.self class="modal fade"  wire:mode="open" id="openCalendarCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adiccionar </h5>
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
                                <label >Sprint</label>
                                <input type="number" min="1" max="100"class="form-control"  wire:model="sprint" name="sprint"></input>
                                @error('sprint') <span class="text-danger error">{{ $message }}</span>@enderror
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
                        <button type="button" wire:click="store()" class="btn btn-primary close-modal" >Guardar</button>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
     livewire.on('noPermitCreateCalendar' ,() =>{
       Swal.fire({
   icon: 'error',
   title: 'No pudes editar la empresa',
   text: 'El plazo de cambios se vencio', 
   confirmButtonText: 'Aceptar'
 })
     })
   </script>   
    <script>
        livewire.on('createAlertCalendar',  ()=>{   
         Swal.fire({
           icon: 'success',
           title: 'La entrega de calendario ha sido creada',
           showConfirmButton: false,
           timer: 1500
         })
          })  
   </script>
    <script type="text/javascript">
        window.livewire.on('hideCreateCalendar', () => {
          $('#openCalendarCreate').modal('hide');
          });
      </script>
</div>
