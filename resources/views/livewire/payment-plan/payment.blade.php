<div>
    <div class="row justify-content-center">       
        <h2 class="text-center">Pagos</h2>
    </div>
    <div class="row justify-content-center">
        @can('paymentplan.create')
        @livewire('payment-plan.payment-create',['id'=>$idP])
        @endcan
    </div>
    <div class="row">
        <table class="table table-light">
            <thead class="thead-light">
              <tr>
                  <th>Fecha</th>
                  <th>Porcentaje</th>
                  <th>Costo</th>    
                  <th>Entregable</th>
                  <th>Accion</th>   
              </tr>
          </thead>
          <tbody>
            @foreach ($paymentPlan as $item)
              <tr>
                <td>{{$item->dueDate}}</td>
                <td>{{$item->percentage}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->description}}</td>
                <td>
                    @can('paymentplan.edit')
                    <button class="btn btn-primary" wire:click="edit({{$item}})" data-toggle="modal" data-target="#editPayment">Editar</button>
                    @endcan
                    @can('paymentplan.delete')
                    <button class="btn btn-danger"   wire:click="$emit('deletePaymentAlert',{{$item}})">Eliminar</button>
                    @endcan
                </td>
              </tr>
              @endforeach
          </tbody>
      </table>
    <div wire:ignore.self class="modal fade"  wire:mode="open" id="editPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="date" class="form-control"  wire:model="payment.dueDate" name="dueDate"></input>
                            @error('payment.dueDate') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label >Porcentaje</label>
                            <input type="number" min="1" max="100" class="form-control"  wire:model="payment.percentage" name="percentage"></input>
                            @error('payment.percentage') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label >Costo</label>
                            <input type="number" class="form-control"  wire:model="payment.amount" name="amount"></input>
                            @error('payment.amount') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label >Entregable</label>
                            <textarea  class="form-control"  wire:model="payment.description" name="description"></textarea>
                            @error('payment.description') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click="update()" class="btn btn-primary close-modal" data-dismiss="modal">Guardar</button>
                </div>
            </div>

        </div>
    </div>
 </div>
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    livewire.on('deletePaymentAlert',  item=>{   
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
   livewire.emitTo('payment-plan.payment','delete',item);
   Swal.fire(
     'Eliminado!',
     'La publicación ha sido eliminada.'
   )
  }
  });    
    })
  </script>
  <script>
       livewire.on('editAlert',  ()=>{   
        Swal.fire({
          icon: 'success',
          title: 'El pago ha sido actualizado',
          showConfirmButton: false,
          timer: 1500
        })
         })  
  </script>
    <script>
        livewire.on('noPermitPayment' ,() =>{
          Swal.fire({
      icon: 'error',
      title: 'No pudes editar la empresa',
      text: 'El plazo de cambios se vencio', 
    })
        })
      </script>  
</div>
