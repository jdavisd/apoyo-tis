@extends('layouts.app')

@section('title', 'Cambio de Contraseña')
    
@section('content')
<div class="card text-center">
    <form action="{{route('usuario.update',$user)}}" method="POST">
        @csrf
        @method('PUT')
        <label>Nueva Contraseña</label>
        <div>
        <input type="password" name="password" id="password">
        @error('password')
            <span class="alert alert-danger" role="alert">
            <small>{{ $message }}</small>
            </span>
        @enderror
        </div>
        <div class="mb-3">
            <button class="btn btn-primary my-4" type="submit">Cambiar</button>
        </div>
    </form>
</div>    
@endsection