@extends('layouts.app')

@section('title', 'Publicaciones')
    

@section('content')
    
<br>
<div class="container">
    <div class="row row-cols-1 row-cols-md-2">
        @foreach ($documents as $doc)
            <div class="col mb-4">
                <div class="card" style="background-color:  #F24343">
                    <div class="card-body">
                        <h1 class="card-title">{{$doc->title}}</h1>
                        <p class="card-text">{{$doc->code}}</p>
                        <p class="card-text">{{$doc->period}}</p>
                        <p class="card-text">{{$doc->description}}</p>
                        <a class="btn btn-danger" href="{{asset('../storage/app/public/anuncios'.'/'.$doc->name)}}" target="blank_">Ver Documento</a>
                    </div>
                </div>          
            </div>
        @endforeach  
    {{-- {{$documents->links()}} --}}
    </div>
</div>
@endsection

