@extends('layouts.appadmin')



@section('content')
    <h2 class="text-center">Editar Rol</h2>
    @if (session('info'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('info')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
    </div>
@endif

<div class="row justify-content-center" >
<div class="card col-md-8">
    <div class="card-body">
        {!! Form::model($role, ['route'=>['admin.roles.update',$role],'method'=>'put']) !!}
        <label for=""  class="form-control">{{$role->name}}</label>
    
        @include('admin.roles.partials.form')
        @error('permissions')
            <small class="text-danger" style="font-weight: bold;"">Debe seleccionar almenos un permiso</small>         
          @enderror
    <br>
    <div class="row justify-content-center" >
        {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>

</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop