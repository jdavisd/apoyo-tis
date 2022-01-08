@extends('layouts.appadmin')



@section('content')
<h2 class="text-center">Crear un rol</h2>
  <div class="card">
      <div class="card-body">
          
     {!! Form::open(['route'=>'admin.roles.store']) !!}
     {!! Form::label('name', 'Nombre') !!}
     {!! Form::text('name', null, ['id'=>'name','class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : null),'placeholder'=>'ingrese nombre del rol']) !!}
   
     @error('name')
       <small class="text-danger" style="font-weight: bold;"">{{$message}}</small>         
     @enderror
     @include('admin.roles.partials.form')
      @error('permissions')
        <small class="text-danger" style="font-weight: bold;"">Debe seleccionar almenos un permiso</small>         
      @enderror
      <br>
     {!! Form::submit('Crear rol', ['class'=>'btn btn-primary']) !!}
     {!! Form::close() !!}
      </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    
@stop