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
   <div class="card">
     <div class="card-header">
        Editar contraseña

     </div>

     <div class="card-body">
    
           
                <form method="POST" action="{{ route('user.password.update',$user) }}" >
                    @csrf
                    @method('PUT')
                    <div class="row my-3">
                        <label for="password" class="col-md-4 text-md-right">contraseña </label>
                        <div class="col-md-6">
                            <input   class="form-control  @error('password') is-invalid @enderror" id="password"name ="password"type="password"class="form-control">    
                        @error('password')
                        <div class=""><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                      @enderror
                       </div>
                      </div>
          
        
                      <div class="row my-3">
                        
      <label  class="col-md-4 text-md-right" for="password_confirmation">Confirmar contraseña</label>
                        <div class="col-md-6">
                            <input name ="password_confirmation"type="password"class="form-control  @error('password_confirmation') is-invalid @enderror">    
                        @error('password_confirmation')
                        <div class=""><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                      @enderror
                      @if (session('message-fail'))
                      <div class=""><small class="text-danger col-md" style="font-weight: bold;"">   <strong>{{session('message-fail')}}</strong></small></div> 
           
                     @endif
                       </div>
                      </div>
                    
      
   
    
         <input   class="btn btn-primary" style="display: block; margin: 0 auto ;" type="submit" value="Enviar">
     
    </form>
                  
       
 

     </div>


   </div>
   
</div>
</div>
</div>
@endsection