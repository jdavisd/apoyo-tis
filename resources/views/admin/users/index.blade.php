@extends('adminlte::page')

@section('title', 'Apoyo')

@section('content_header')
    <a class="btn btn-primary btn-sm float-right" href="{{route('admin.usersimport.create')}}">importar Usuarios</a>
    <a class="btn btn-primary btn-sm float-right mx-3" href="{{ route('register') }}">Registrar Usuario</a>
    <h1>Usuarios</h1>
    @if (session('info'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('info')}}</strong>
    </div>
@endif
@stop


@section('content')
    @livewire('admin.users-index')    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!ffddsf'); </script>

@stop