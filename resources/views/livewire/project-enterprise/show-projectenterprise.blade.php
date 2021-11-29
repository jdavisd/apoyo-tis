<div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div>  
        <div class="row justify-content-center">
        <h1>{{$enterprise->short_name}}</h1>
        <button type="button" class="btn btn-secundary" data-toggle="modal" data-target="#detalles" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
        </button>
      </div>
     <a href="{{route('user.enterpriseproject.edit',$project->id)}}"> Editar</a>
     <button class ="btn btn-success mx-1" wire:click="$emit('salirse',{{$enterprise->id}})" >Salir</button>
        <!-- Modal -->
        <div wire:ignore.self class="modal fade"  wire:mode="open" id="detalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="width:1250px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true close-btn">×</span>
                        </button>
                    </div>
                   <div class="modal-body">
                        <form>
                          <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              
                              <div class="form-group row">
                                <label for="name" class="col-md-6 col-form-label text-md-right">Nombre Corto:</label>
                                <div class="col-md-3">
                                  <label for="name" class="col-form-label">{{$enterprise->short_name}}</label>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-md-6 col-form-label text-md-right">Nombre Largo:</label>
                                <div class="col-md-3">
                                  <label for="name" class="col-form-label">{{$enterprise->long_name}}</label>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-md-6 col-form-label text-md-right">Telefono:</label>
                                <div class="col-md-3">
                                  <label for="name" class="col-form-label">{{$enterprise->phone}}</label>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-md-6 col-form-label text-md-right">Correo:</label>
                                <div class="col-md-3">
                                  <label for="name" class="col-form-label">{{$enterprise->email}}</label>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-md-6 col-form-label text-md-right">Sociedad:</label>
                                <div class="col-md-3">
                                  <label for="name" class="col-form-label">{{$enterprise->type}}</label>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-md-6 col-form-label text-md-right">Socios:</label>
                                <div class="col-md-5">
                                  @foreach ($socios as $item)               
                                    <label for="name" class="col-form-label">{{$item->name}}</label>
                                  @endforeach           
                                </div>
                              </div>
                                                          
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label for="name"></label>
                              <div class="col-md-12">
                                <img src="{{asset('storage/logos').'/'.$logo->name}}" alt="" width="200" height="300">
                              </div>
                            </div> 
                          </div>
                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                        {{-- <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Agregar</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
      
    </div>
  </div>
    <div>
      <br>
      <h3>Propuestas</h3>
      @can('propuesta.create')
      @livewire('payment.create-payment',['id'=>$idP])
      @endcan
    
    </div>
    <div class="my-5">
        <table class="table table-light">
            <thead class="thead-light">
              <tr>
                  <th>Fecha</th>
                  <th>Asunto</th>
                  <th>Estado</th>    
                  <th>Accion</th>   
              </tr>
          </thead>
          <tbody>
            @foreach ($documents as $item)
              <tr>
                <td>{{$item->created_at}}</td>
                <td>{{$item->details}}</td>
                {{-- <td><a class="btn btn-primary mx-2" href="{{route('file',$item->name)}}">Descargar</a></td> --}}
                <td>
                  @can('proyecto.index')
                  <button class ="btn btn-success mx-1" wire:click="$emit('acceptar',{{$item->id}})" >Aprobar</button>
                  <a class="btn btn-danger mx-1" wire:click="$emit('rechazar',{{$item->id}})" >Rechazar</a>
                  {{$item->status}}
                  @endcan
                  @can('propuesta.create')
                    {{$item->status}}
                  @endcan
                </td>
                <td>
                  <a class="btn btn-primary mx-2" href="{{asset('storage/pagos').'/'.$item->name}}" target="blank_">Ver</a>
                  <button class ="btn btn-danger mx-1" wire:click="$emit('borrar',{{$item->document_id}})" >Eliminar</button>
                  {{-- <button class ="btn btn-danger mx-1" wire:click="test({{$item->document_id}})" >Eliminar</button> --}}
                  {{$item->document_id}}
                </td>
                
                </tr>
              @endforeach
          </tbody>
      </table>
   </div>
  <div class="card-footer">
    
  </div>
@livewireScripts
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
  <script type="text/javascript">
  window.livewire.on('userStore', () => {
      $('#exampleModal').modal('hide');
  });
  </script>
  <script>
            livewire.on('acceptar',  userI=>{
               Swal.fire({
         title: 'Estas seguro?',
         text: "No podras revertir los cambios!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Si'
        }).then((result) => {
         if (result.isConfirmed) {
           Livewire.emitTo('project-enterprise.show-projectenterprise','accept',userI);
           Swal.fire(
             'Eliminado!',
             'La publicación ha sido eliminada.'
           )
         }
        });
        
            })
           
          </script>

          <script>
            livewire.on('rechazar',  userID=>{   
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
           livewire.emitTo('project-enterprise.show-projectenterprise','reject',userID);
           Swal.fire(
             'Eliminado!',
             'La publicación ha sido eliminada.'
           )
         }
        });    
            })
          </script>
        </script>

<script>
  livewire.on('borrar',  userID=>{   
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
 livewire.emitTo('project-enterprise.show-projectenterprise','delete',userID);
 Swal.fire(
   'Eliminado!',
   'La publicación ha sido eliminada.'
 )
}
});    
  })
</script>

          {{-- <script>
            livewire.on('borrar',  docID=>{
              Livewire.emit('delete',userID);
          
            })
  </script> --}}
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
    livewire.on('salirse',  userID=>{ 
    swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    livewire.emitTo('project-enterprise.show-projectenterprise','leave',userID); 
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
    
  } else {
    swal("Your imaginary file is safe!");
  }
});
    })
  </script>
  </script>
</div>
