@extends('layouts.app')

@section('title', 'Crear un Anuncio')
    
@section('content')
<div class="card text-center">
    <h1> Publicar un Anuncio</h1>
    <form action="{{route('anuncio.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card" style="background-color:  #F24343;margin: auto auto;width: 600px">
            <div class="form-group col text-white">
                <div class="row my-3">
                    <label class="col-md-4 text-md-right" for="title">Titulo:</label>
                    <input class="col-md-5" type="text" name="title">
                </div>
                <div class="row my-3">
                    <label class="col-md-4 text-md-right" for="code">Codigo:</label>
                    <input class="col-md-5" type="text" name="code">
                </div>
                <div class="row my-3">
                    <label class="col-md-4 text-md-right" for="date">Periodo:</label>
                    <input class="col-md-5" type="text" name="period" >
                </div>
                <div class="row my-3">
                    <label class="col-md-4 text-md-right" for="description">Descripcion:</label>
                    <input class="col-md-5" type="text" name="description">
                </div>
                <div class="row my-3">
                    <label class="col-md-3 text-md-right" for="document">Adjuntar:</label>
                    <input class="col-md-8" type="file" name="document">
                </div>
            </div>      
            <div class="mb-3">
                <button class="btn btn-danger" type="submit">Publicar</button>
            </div>
        </div>
    </form>
</div>
@endsection