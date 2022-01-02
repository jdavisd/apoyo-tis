<div>
    <div class="row justify-content-center">       
        <h2 class="text-center">Calendario de entregas</h2>
    </div>
    <div class="row justify-content-center">
        @can('calendar.create')
        @livewire('calendar.calendar-create',['id'=>$idP])
        @endcan
   
    </div>
    <div class="row">
        <table class="table table-light">
            <thead class="thead-light">
              <tr>
                  <th>Sprint</th>
                  <th>Fecha</th>
                  <th>Entregable</th>    
                  <th>Accion</th>   
              </tr>
          </thead>
          <tbody>
            @foreach ($calendarPlan as $item)
              <tr>
                <td>{{$item->sprint}}</td>
                <td>{{$item->dueDate}}</td>
                <td>{{$item->description}}</td>
                <td>

                    @can('calendar.edit')
                    <button class="btn btn-primary" wire:click="edit({{$item}})" data-toggle="modal" data-target="#editCalendar">Editar</button>
                    @endcan
                    @can('calendar.delete')
                    <button class="btn btn-danger"   wire:click="$emit('deleteCalendarAlert',{{$item}})">Eliminar</button>
                    @endcan
                </td>
              </tr>
              @endforeach
          </tbody>
      </table>
    <div wire:ignore.self class="modal fade"  wire:mode="open" id="editCalendar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
               <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label >Fecha</label>
                            <input type="date" class="form-control"  wire:model="calendar.dueDate" name="dueDate"></input>
                            @error('calendar.dueDate') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label >Sprint</label>
                            <input type="number" min="1" max="100" class="form-control"  wire:model="calendar.sprint" name="sprint"></input>
                            @error('calendar.sprint') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                     
                        <div class="form-group">
                            <label >Entregable</label>
                            <textarea  class="form-control"  wire:model="calendar.description" name="description"></textarea>
                            @error('calendar.description') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click="update()" class="btn btn-primary close-modal" >Guardar</button>
                </div>
            </div>

        </div>
    </div>
 </div>
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    livewire.on('deleteCalendarAlert',  item=>{   
       Swal.fire({
  title: 'Estas seguro?',
  text: "No podras revertir los cambios!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Aceptar'
  }).then((result) => {
  if (result.isConfirmed) {
   livewire.emitTo('calendar.calendar-table','delete',item);
   Swal.fire(
     'Eliminado!',
     'La publicación ha sido eliminada.'
   )
  }
  });    
    })
  </script>
  <script>
       livewire.on('editAlertCalendar',  ()=>{   
        Swal.fire({
          icon: 'success',
          title: 'El calendario ha sido actualizado',
          showConfirmButton: false,
          timer: 1500
        })
         })  
  </script>
    <script>
        livewire.on('noPermitCalendar' ,() =>{
          Swal.fire({
      icon: 'error',
      title: 'No pudes editar la empresa',
      text: 'El plazo de cambios se vencio', 
    })
        })
      </script>  
          <script type="text/javascript">
            window.livewire.on('hideEditCalendar', () => {
              $('#editCalendar').modal('hide');
              });
          </script>
</div>
