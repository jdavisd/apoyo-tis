@extends('layouts.app')

@section('content')
@if (session('message-sucess'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('message-sucess')}}</strong>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('user.password.update',$user) }}" >
                @csrf
                @method('PUT')
                
         <label for="password">contraseña </label>
          <input id="password"name ="password"type="password"class="form-control">    
   
       @error('password')
       <span class="alert alert-danger" role="alert">
       <strong>{{ $message }}</strong>
        </span>
        @enderror

                
  <label for="password_confirmation">Confirmar contraseña</label>
   <input name ="password_confirmation"type="password"class="form-control">    
  
   @error('password_confirmation')
   <div class="alert alert-danger" role="alert">
   <strong>{{ $message }}</strong>
   </div>

    @enderror
    @if (session('message-fail'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('message-fail')}}</strong>
    </div>
@endif
   <br>
     <button class="form-submit" type="submit" value="enviar">Enviar</button>
 
</form>
              
        </div>
    </div>
</div>
@endsection