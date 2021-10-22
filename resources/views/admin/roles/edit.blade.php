@extends('adminlte::page')

@section('title', 'Apoyo')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('info')}}</strong>
    </div>
@endif
    {!! Form::model($role, ['route'=>['admin.roles.update',$role],'method'=>'put']) !!}
    
    @include('admin.roles.partials.form')
    {!! Form::submit('Editar rol', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop