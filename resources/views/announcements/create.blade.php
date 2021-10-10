@extends('layouts.app')

@section('title', 'Crear un Anuncio')
    

@section('content')
<div class="card text-center">
    <br>
    <h1> Publicar un Anuncio</h1>
    <br>
    <form action="{{route('anuncio.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="card" style="background-color:  #F24343;margin: auto auto;width: 800px">
        <div class="form-group" >
            <div>
                <br>
                <label for="title">Titulo:</label>
                <input type="text" name="title">
            </div><br>
            <div>
                <label for="code">Codigo:</label>
                <input type="text" name="code">
            </div><br>
            <div>
                <label for="date">Periodo:</label>
                <input type="text" name="period" >
            </div><br>
            <div>
                <label for="description">Descripcion:</label>
                <input type="text" name="description">
            </div><br>
            <div>
                <label for="document">Adjuntar:</label>
                <input  type="file" name="document">
            </div><br>

        </div>
        <div>
            <button class="btn btn-danger" type="submit">Publicar</button>
        </div>
       <br>
    </form>
</div>
@endsection