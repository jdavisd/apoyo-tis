@extends('layouts.app')

@section('title', 'Publicaciones')
    
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong class="h5">Editar un Anuncio</strong></div>
                <div class="card-body">
                    <form action="{{route('anuncio.update',$doc->document_id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row my-3">
                            <label class="col-md-4 text-md-right" for="">Titulo:</label>
                            <div class="col-md-6">
                                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                                value="{{old('title',$announcement->title)}}"  id="" aria-describedby="helpId" placeholder="" >
                                @error('title')
                                    <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                                @enderror
                            </div>
                        </div>
                        <div class="row my-3">
                            <label class="col-md-4 text-md-right" for="code">Codigo:</label>
                            <div class="col-md-6">
                                <input class="form-control @error('code') is-invalid @enderror" type="text" name="code"
                                value="{{old('code',$announcement->code)}}"  id="" aria-describedby="helpId" placeholder="">
                                @error('code')
                                    <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                                @enderror
                            </div>
                        </div>
                        <div class="row my-3">
                            <label class="col-md-4 text-md-right" for="date">Periodo:</label>
                            <div class="col-md-6">
                                <input class="form-control @error('period') is-invalid @enderror" type="text" name="period"
                                value="{{old('period',$announcement->period)}}"  id="" aria-describedby="helpId" placeholder="">
                                @error('period')
                                    <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                                @enderror
                            </div>
                        </div>
                        <div class="row my-3">
                            <label class="col-md-4 text-md-right" for="description">Descripcion:</label>
                            <div class="col-md-6">
                                <input class="form-control @error('description') is-invalid @enderror" type="text" name="description"
                                value="{{old('description',$announcement->description)}}"  id="" aria-describedby="helpId" placeholder="">
                                @error('description')
                                    <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                                @enderror
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-8 text-md-right">
                            <a class="btn btn-primary" href="{{asset('storage/anuncios').'/'.$doc->name}}" target="blank_">Visualizar Documento Actual</a>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label class="col-md-4 text-md-right" for="document">Adjuntar Nuevo Documento:<br>(Sustituira al Actual)</label>
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
                                <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection