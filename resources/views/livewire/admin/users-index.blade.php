<div>
   <div class="card">
    <div class="card-header">
     <input wire:model="search" class="form-control"placeholder="Ingrese nombre o correo del usuario">
     <a class="btn btn-primary my-3" href="{{route('admin.usersimport.create')}}">Importar Usuarios</a>
     <a class="btn btn-primary mx-3" href="{{ route('register') }}">Registrar Usuario</a>
    </div>
       @if ($users->count())
           
       <div class="card-body">
          <table class="table table-striped"
            <thead >
                 <tr>
                     <th>ID</th>
                     <th>Nombre</th>
                     <th>Correo</th>
                     <th></th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($users as $user)
                 <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td class="row">
                      <a class ="btn btn-primary mx-1" href="{{route('admin.users.edit',$user)}}">Editar</a>
                       @if (Auth::user()->id!=$user->id)
                        <button class ="btn btn-danger mx-1" wire:click="$emit('deleteUser',{{$user->id}})" >Borrar</button>
                       
                           
                       @endif
  
                    </td>
                </tr>
                 @endforeach
              
             </tbody>
         </table>
          </table>
       </div>
      
           <div class="card-footer">
               {{$users->links()}}
           </div>
           
               
           @else
               <div  class="card-body">
                   <strong>No hay registros</strong>
               </div>
         
           @endif
   </div>
   @livewireScripts
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
     livewire.on('deleteUser',  userID=>{

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
    Livewire.emitTo('admin.users-index','delete',userID);
    Swal.fire(
      'Eliminado!',
      'El usuario ha sido eliminado.'
    )
  }
});

     })


    
   </script>
</div>
