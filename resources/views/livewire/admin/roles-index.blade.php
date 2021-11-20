<div>
    <div>
  
        <div class="card">
            <div class="card-body">
                <table class="table table-striped"
                  <thead class="thead-light">
                       <tr>
                           <th>ID</th>
                           <th>Rol</th>
                           <th colspan="2"></th>
                        
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($roles as $role)
                       <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td  width="10px"><a class ="btn btn-sm btn-primary" href="{{route('admin.roles.edit',$role)}}">Editar</a></td>
                        
                            @if ($role->name!='Admin')
                            <td width="10px">  
                                <button class ="btn btn-danger mx-1" wire:click="$emit('deleteUser',{{$role->id}})" >Borrar</button></td>
                            @endif
                     
                      </tr>
                       @endforeach
                    
                   </tbody>
               </table>
                </table>
             </div>
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
           Livewire.emitTo('admin.roles -index','delete',userID);
           Swal.fire(
             'Eliminado!',
             'El rol ha sido eliminado.'
           )
         }
        });
        
            })
        
        
           
          </script>
    
    </div>
</div>