@extends('layouts.app')

@section('title', 'Publicaciones')
    

@section('content')
    
<br>
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
                        <div class="col align-self-end"  >
                            <a class="btn btn-primary" href="{{asset('storage/anuncios').'/'.$doc->name}}" target="blank_">Ver Documento</a>
                            <form action="{{route('anuncio.destroy',$doc)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>    
                        </div> 
                    </div>          
                </div>          
            </div>
        @endforeach  
    {{-- {{$documents->links()}} --}}
    </div>
</div>
@endsection

