@extends('adminlte::page')

@section('title', 'Apoyo')

@section('content_header')
    <h1>Editar usuario</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('info')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
    </div>
@endif
    
 <div class="card">
     <div class="card-body">
  

     {!! Form::model($user, ['route'=>['admin.users.update',$user],'method'=>'put']) !!}
       
     <label class="" for="name">Nombre:</label>
         <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
         value="{{old('name',$user->name)}}"  id="" aria-describedby="helpId" placeholder="" >
         @error('name')
             <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
         @enderror
         
         <label class="" for="email">Correo Electrónico:</label>
         <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
         value="{{old('email',$user->email)}}"  id="" aria-describedby="helpId" placeholder="" >
         @error('email')
             <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
         @enderror
         <label class="" for="">Roles:</label>
     @foreach ($roles as $role)
         <div>
             <label >
                 {!! Form::checkbox('roles[]', $role->id,null, ['class'=>'mr-1']) !!}
                 {{$role->name}}
             </label>
         </div>
     @endforeach
     {!! Form::submit('Guardar', ['class'=>'btn btn-primary mt-2']) !!}
     {!! Form::close() !!}
     </div>
 </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop