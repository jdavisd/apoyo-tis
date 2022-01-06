@extends('layouts.app')

@section('title', 'Crear un Anuncio')
    
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><strong class="h5">Realizar una publicación</strong></div>
            <div class="card-body">
                <small class="text-danger">Los campos con * son obligatorios</small>
                <form action="{{route('anuncio.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row my-3">
                        <label class="col-md-4 text-md-right" for="">Título: *</label>
                        <div class="col-md-6">
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                            value="{{old('title')}}"  id="" aria-describedby="helpId" placeholder="">
                            @error('title')
                                <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                            @enderror
                        </div>
                    </div>
                    <div class="row my-3">
                        <label class="col-md-4 text-md-right" for="code">Código: *</label>
                        <div class="col-md-6">
                            <input class="form-control @error('code') is-invalid @enderror" type="text" name="code"
                            value="{{old('code')}}"  id="" aria-describedby="helpId" placeholder="">
                            @error('code')
                                <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                            @enderror
                        </div>
                    </div>
                    <div class="row my-3">
                        <label class="col-md-4 text-md-right" for="date">Gestión: *</label>
                        <div class="col-md-6">
                            <input class="form-control @error('period') is-invalid @enderror" type="text" name="period"
                            value="{{old('period')}}"  id="" aria-describedby="helpId" placeholder="">
                            @error('period')
                                <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                            @enderror
                        </div>
                    </div>
                    <div class="row my-3">
                        <label class="col-md-4 text-md-right" for="description">Descripción: *</label>
                        <div class="col-md-6">
                            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description"
                            value="{{old('description')}}"  id="" aria-describedby="helpId" placeholder="">
                            @error('description')
                                <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                            @enderror
                        </div>
                    </div>
                    <div class="row my-3">
                        <label class="col-md-4 text-md-right" for="document">Adjuntar: *</label>
                        <div class="col-md-6">
                            <input class="form-control @error('document') is-invalid @enderror" type="file" name="document" accept=".pdf"
                            value="{{old('document')}}"  id="" aria-describedby="helpId" placeholder="">
                            @error('document')
                                <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                            @enderror
                        </div>
                    </div>     
                    <div class="row my-3">
                        <div class="col-md-7 text-md-right"> 
                            <button class="btn btn-primary" type="submit">Publicar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection