@extends('layouts.app')

@section('title', 'Crear un Anuncio')
    
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Publicar Anuncio</div>





    <form action="{{route('anuncio.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group col text-black">
                <div class="row my-3">
                    <label class="col-md-4 text-md-right" for="title">Titulo:</label>
                    <input class="form-control col-md-5" type="text" name="title">
                </div>
                <div class="row my-3">
                    <label class="col-md-4 text-md-right" for="code">Codigo:</label>
                    <input class="form-control col-md-5" type="text" name="code">
                </div>
                <div class="row my-3">
                    <label class="col-md-4 text-md-right" for="date">Periodo:</label>
                    <input class="form-control col-md-5" type="text" name="period" >
                </div>
                <div class="row my-3">
                    <label class="col-md-4 text-md-right" for="description">Descripcion:</label>
                    <input class="form-control col-md-5" type="text" name="description">
                </div>
                <div class="row my-3">
                    <label class="col-md-4 text-md-right" for="document">Adjuntar:</label>
                    <input class="col-md-5" type="file" name="document" accept=".pdf">
                </div>
            </div>      
       
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button class="btn btn-primary" type="submit">Publicar</button>
                </div>
            </div>
        </div>
    </form>

</div>
</div>
</div>
</div>
@endsection