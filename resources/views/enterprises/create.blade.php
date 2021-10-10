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
<form method="POST" action="{{route('empresa.store')}}">
    @csrf
    <div class="mb-3">
      <label for="" class="form-label">Nombre Corto</label>
      <input type="text"
        class="form-control" name="short_name" id="" aria-describedby="helpId" placeholder="">
     
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Proyecto</label>
      <input type="text"
        class="form-control" name="logo" id="" >
   
    </div>
    <!--
    <div class="mb-3">
      <label for="" class="form-label">Consultor</label>
      <select class="form-control" name="adviser" id="">
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>
   
    </div>
-->
    <div class="mb-3">
      <label for="" class="form-label">Telefono</label>
      <input type="number"
        class="form-control" name="phone" id="" aria-describedby="helpId" placeholder="">
   
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Correo Electronico</label>
      <input type="email"
        class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
   
    </div>
 
   
    <div class="mb-3">
      <label for="" class="form-label">Nombre largo</label>
      <input type="text"
        class="form-control" name="long_name" id="" aria-describedby="helpId" placeholder="">
   
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Direccion</label>
      <input type="text"
        class="form-control" name="address" id="" aria-describedby="helpId" placeholder="">
   
    </div>
<!--
    <div class="mb-3">
      <label for="" class="form-label">Socios</label>
      <input type="text"
        class="form-control" name="partners" id="" aria-describedby="helpId" placeholder="">
   
    </div>
-->
    <div class="mb-3">
      <label for="" class="form-label">tipo sociedad</label>
      <input type="text"
        class="form-control" name="type" id="" aria-describedby="helpId" placeholder="">
   
    </div>
    <!--
    <div class="mb-3">
     <label >Logo</label>
     <br>
     <input  type="file" name="logo" id=""  >
     </div>    -->
  
    
</form>
</div>
</div>
@endsection
