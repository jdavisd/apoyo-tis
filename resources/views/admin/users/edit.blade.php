@extends('layouts.appadmin')



@section('content')
<h2 class="text-center">Editar usuario</h2>
@if (session('info'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('info')}}</strong>
    </div>
@endif
<div class="row justify-content-center" >
 <div class="card col-md-8">
     <div class="card-body">
     {!! Form::model($user, ['route'=>['admin.users.update',$user],'method'=>'put']) !!}

     <label class="" for="name">Nombre: *</label>
         <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
         value="{{old('name',$user->name)}}"  id="" aria-describedby="helpId" placeholder="" >
         @error('name')
             <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>
         @enderror

         <label class="" for="email">Correo Electronico: *</label>
         <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
         value="{{old('email',$user->email)}}"  id="" aria-describedby="helpId" placeholder="" >
         @error('email')
             <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>
         @enderror

         <label class="" for="group">Grupo: *</label>
         <input class="form-control @error('group') is-invalid @enderror" type="number" name="group"
         value="{{old('group',$user->group)}}"  id="" aria-describedby="helpId" placeholder="" >
         @error('group')
             <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>
         @enderror

         @if (Auth::user()->id!=$user->id)
         <label class="" for="">Role: *</label>
         @foreach ($roles as $role)
         <div>
             {{-- <label >
                 {!! Form::checkbox('roles[]', $role->id,null, ['class'=>'mr-1']) !!}
                 {{$role->name}}
             </label> --}}
             <label for="">
                 @if ($user->hasRole($role->name))
                    <input type="radio" id="html" name="role" value={{$role->id}} checked="checked">
                    <label for="html">{{$role->name}}</label>
                 @else
                 <input type="radio" id="html" name="role" value={{$role->id}}>
                 <label for="html">{{$role->name}}</label>
                 @endif
                
             </label>
         </div>
     @endforeach
     @error('roles')
         <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">Debe seleccionar un unico rol</small></div>
        @enderror
         @endif

     {!! Form::submit('Guardar Cambios', ['class'=>'btn btn-primary mt-2']) !!}
     {!! Form::close() !!}
     </div>
 </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop