@extends('adminlte::page')

@section('title', 'Apoyo')

@section('content_header')
    <a class="btn btn-primary btn-sm float-right" href="{{route('admin.usersimport.create')}}">importar Usuarios</a>
    <h1>Usuarios</h1>
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