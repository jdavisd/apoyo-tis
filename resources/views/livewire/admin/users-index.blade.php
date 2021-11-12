<div>
  
   <div class="card">
    <div class="card-header">
     <input wire:model="search" class="form-control"placeholder="Ingrese nombre o correo del usuario">
    {{$search}}
    
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
                      <form action="{{route('admin.users.destroy',$user->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
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
</div>
