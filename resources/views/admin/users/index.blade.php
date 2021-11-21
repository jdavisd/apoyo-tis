@extends('adminlte::page')

@section('title', 'Apoyo')

@section('content_header')
    <h1>Usuarios</h1>
    {{-- <a class="btn btn-primary btn-sm my-3" href="{{route('admin.usersimport.create')}}">Importar Usuarios</a>
    <a class="btn btn-primary btn-sm mx-3" href="{{ route('register') }}">Registrar Usuario</a> --}}
    
    @if (session('info'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('info')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
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