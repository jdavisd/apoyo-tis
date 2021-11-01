@extends('layouts.app')

@section('title', 'Publicaciones')
    
@section('content')
    
<br>
@if ($documents->count())
<div class="container">
    <div class="row row-cols-1 row-cols-md-2">
        @foreach ($documents as $doc)
            <div class="col mb-4">
                <div class= "card h-100" >
                    <div class="card-header">
                        <label  class="card-title h5"><strong>{{$doc->title}}</strong></label>
                    </div>
                    <div class="card-body">  
                        <p class="card-text">{{$doc->code}}</p>
                        <p class="card-text">{{$doc->period}}</p>
                        <p class="card-text">{{$doc->description}}</p>
                        <div class="row align-self-end"  >
                            @can('anuncio.document')
                                <a class="btn btn-primary mx-2" href="{{asset('storage/anuncios').'/'.$doc->name}}" target="blank_">Ver Documento</a>
                            @endcan
                            @can('anuncio.destroy')
                            <form action="{{route('anuncio.destroy',$doc->document_id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger mx-2" type="submit">Eliminar</button>
                            </form>
                            @endcan
                            @can('anuncio.edit')
                                <a class="btn btn-primary mx-2" href="{{route('anuncio.edit',$doc->document_id)}}">Editar</a>    
                            @endcan
                        </div> 
                    </div>          
                </div>          
            </div>
        @endforeach  
    {{-- {{$documents->links()}} --}}
    </div>
</div>
@else
<div  class="text-center">
    <h3>Aun no se ha pulicado ningun anuncio</h3>
</div>

@endif

@endsection

