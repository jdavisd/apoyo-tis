@extends('adminlte::page')

@section('title', 'Apoyo')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <p>Usuarios.</p>
    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop