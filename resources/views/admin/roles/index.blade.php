@extends('adminlte::page')

@section('title', 'Apoyo')

@section('content_header')
{{-- <a class="btn btn-primary btn-sm float-right" href="{{route('admin.roles.create')}}">Nuevo rol</a> --}}
    <h1>Roles</h1>
    
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('info')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
    </div>
@endif
  <div class="card">
      <div class="card-header">
        <a class="btn btn-primary" href="{{route('admin.roles.create')}}">Registrar rol</a>
      </div>
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
    
@stop