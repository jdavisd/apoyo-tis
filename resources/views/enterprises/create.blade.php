@extends('layouts.app')

@section('content')
<div class="container-fluid" style="
    background-color: #6cb2eb;
    max-width: 120rem;
    width:  75%;
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
        class="form-control" name="short_name"  value="{{old('short_name')}}"  id="" aria-describedby="helpId" placeholder="">
     @error('short_name')
         <br>
         <small style="color: rgb(255, 4, 54);">*{{$message}}</small>
         <br>

     @enderror
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
  <label for="" class="form-label">Logo</label>
  <input type="text"
    class="form-control" name="logo" value="{{old('logo')}}"  id="" aria-describedby="helpId" placeholder="">
    @error('logo')
    <br>
    <small style="color: rgb(255, 4, 54);">*{{$message}}</small>
    <br>

@enderror
</div>
<div class="mb-3">{!! Form::label('project_id', 'Proyecto') !!}
  {!! Form::select ('project_id', $project, null, ['class'=>'form-control']) !!}
  @error('project_id')
  <br>
  <small style="color: rgb(255, 4, 54);">*{{$message}}</small>
  <br>

@enderror
    </div>
<div class="mb-3">
   
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Telefono</label>
      <input type="number"
        class="form-control" name="phone" value=" {{old('phone')}}" id="" aria-describedby="helpId" placeholder="">
        @error('phone')
        <br>
        <small style="color: rgb(255, 4, 54);">*{{$message}}</small>
        <br>
      
      @enderror
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Correo Electronico</label>
      <input type="email"
        class="form-control" name="email" value="{{old('email')}}" id="" aria-describedby="helpId" placeholder="">
        @error('email')
        <br>
        <small style="color: rgb(255, 4, 54);">*{{$message}}</small>
        <br>
      
      @enderror
    </div>
 
   
    <div class="mb-3">
      <label for="" class="form-label">Nombre largo</label>
      <input type="text"
        class="form-control" name="long_name"  value=" {{old('long_name')}}" id="" aria-describedby="helpId" placeholder="">
        @error('long_name')
        <br>
        <small style="color: rgb(255, 4, 54);">*{{$message}}</small>
        <br>
      
      @enderror
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Direccion</label>
      <input type="text"
        class="form-control" name="address" value=" {{old('long_name')}}" id="" aria-describedby="helpId" placeholder="">
        @error('address')
        <br>
        <small style="color: rgb(255, 4, 54);">*{{$message}}</small>
        <br>
      
      @enderror
   
    </div>
    <div class="mb-3">{!! Form::label('adviser_id', 'Consultor') !!}
      {!! Form::select ('adviser_id', $adviser, null, ['class'=>'form-control']) !!}
        </div>
        @error('adviser_id')
        <br>
        <small style="color: rgb(255, 4, 54);">*{{$message}}</small>
        <br>
      
      @enderror
    <div class="mb-3">
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
        class="form-control" name="type" value="{{old('type')}}" id="" aria-describedby="helpId" placeholder="">
        @error('type')
        <br>
        
        <small style="color: rgb(255, 4, 54);">*{{$message}}</small>
        <br>
      
      @enderror
    </div>
     <input name="" id="" class="btn btn-success"  style="display: block; margin: 0 auto;"  type="submit" value="Guardar">
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
