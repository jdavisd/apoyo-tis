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
@livewire('admin.roles-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop