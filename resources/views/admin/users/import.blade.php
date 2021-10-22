@extends('adminlte::page')

@section('title', 'Apoyo')

@section('content_header')
    <h1>Importar usuarios</h1>
@stop

@section('content')
<section style="padding-top:60;">
    <div class="container">
       <div class="row">
          <div class="col-md-6 offset-md3">
              <div class="card">
                  <div class="card-header">
                      <!--<h3>Importar usuarios</h3>-->
                  </div>
                  <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route('admin.usersimport.store')}}">

                      @csrf
                      <div class="form-group">
                          <label for="file">
                             Subir archivo 
                          </label>
                          <input class="form-control" type="file" name="file">
                          @foreach ($roles as $role)
                          <div>
                              <label >
                                  {!! Form::checkbox('roles[]', $role->id,null, ['class'=>'mr-1']) !!}
                                  {{$role->name}}
                              </label>
                          </div>
                           @endforeach
                          <button type="submit" class="btn btn-primary">subir</button>
                      </div>

                    </form>

                  </div>
              </div>

          </div>
       </div>
    </div>


 </section>
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop