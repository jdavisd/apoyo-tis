<div class="form-group">
  
    </div>
    <h3>Lista de permisos</h2>
       @foreach ($permissions as $permission)
           <div>
               <label >
                   {!! Form::checkbox('permissions[]', $permission->id,null, ['class'=>'mr-1']) !!}
                   {{$permission->description}}
               </label>
           </div>
       @endforeach