@extends('layouts.app')

@section('content')
<div class="container-fluid" style="
    background-color: #6cb2eb;
    max-width: 120rem;
    width: 75%;
    margin: 2rem auto;


    ">
<h4>Postular</h4>
<div style="
    background-color: #6cb2eb;
    max-width: 120rem;
    width: 90%;
    margin: 1rem auto;
    ">
<form method="POST" action="{{route('proyecto.store')}}">
    @csrf
    <div class="mb-3">
      <label for="" class="form-label">Nombre proyecto</label>
      <input type="text"
        class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
     
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Gestion</label>
      <input type="text"
        class="form-control" name="period" id="" >
   
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Numero de pliego</label>
      <input type="text"
        class="form-control" name="code" id="" >
   
    </div>
    <input name="" id="" class="btn btn-success"  style="display: block; margin: 0 auto;"  type="submit" value="Guardar">
    <br>
</form>
</div>
</div>
@endsection