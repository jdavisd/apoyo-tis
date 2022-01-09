<div>
    <div>
        <div class="card"> 
            <div class="card-body">
              <a class ="btn btn-sm btn-primary mb-2" href="{{route('admin.roles.create')}}">Crear rol</a>
              
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
                        <td  width="10px"><a class ="btn  btn-primary" href="{{route('admin.roles.edit',$role)}}">Editar</a></td>
                        
                            @if ($role->name!='Admin')
                            <td width="10px">  
                                <button class ="btn btn-danger mx-1" wire:click="askdeleteRoles({{$role->id}})" >Borrar</button></td>
                            @endif
                     
                      </tr>
                       @endforeach
                    
                   </tbody>
               </table>
                </table>
             </div>
             <div class="card-footer">
                {{$roles->links()}}
            </div>
          </div>
          @livewireScripts
          <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <script>
            livewire.on('deleteRoles',  userID=>{
        
               Swal.fire({
         title: 'Estas seguro?',
         text: "No podras revertir los cambios!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#616871',
         confirmButtonText: 'Si',
         cancelButtonText: 'Cancelar'
        }).then((result) => {
         if (result.isConfirmed) {
           Livewire.emitTo('admin.roles-index','delete',userID);
           Swal.fire(
             'Eliminado!',
             'El rol ha sido eliminado.'
           )
         }
        });
        
            })
        
        
           
          </script>
          <script>
            livewire.on('notPermit' ,() =>{
        
              Swal.fire({
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar',
          icon: 'error',
          title: 'No pudes eliminar este rol',
          text: 'El rol tiene uno o mas usuarios',
         
        })
        
            })
        
        
           
          </script>
    
    </div>
</div>