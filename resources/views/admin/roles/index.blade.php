@extends('adminlte::page')

@section('title', 'Apoyo')

@section('content_header')
<a class="btn btn-primary btn-sm float-right" href="{{route('admin.roles.create')}}">Nuevo rol</a>
    <h1>Mostrar Rol</h1>
    
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('info')}}</strong>
    </div>
@endif
  <div class="card">
    <div class="card-body">
        <table class="table table-light"
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
                <td width="10px">   <form action="{{route('admin.roles.destroy',$role)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form></td>
              </tr>
               @endforeach
            
           </tbody>
       </table>
        </table>
     </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop