@extends('adminlte::page')

@section('title', 'Apoyo')

@section('content_header')
    <h1>Editar Rol</h1>
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
    {!! Form::model($role, ['route'=>['admin.roles.update',$role],'method'=>'put']) !!}
    {{-- <label for=""  class="form-control">{{$role->name}}</label> --}}
    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
         value="{{old('name',$role->name)}}"  id="" aria-describedby="helpId" placeholder="" >
         @error('name')
             <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>
         @enderror

    @include('admin.roles.partials.form')
    @error('permissions')
        <small class="text-danger" style="font-weight: bold;"">Debe seleccionar almenos un permiso</small>         
      @enderror
<br>
    {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop