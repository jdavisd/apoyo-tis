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
@livewire('admin.roles-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop