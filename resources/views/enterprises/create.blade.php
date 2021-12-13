 @extends('layouts.app')
 

 @section('content') 
 @if (session('info'))
 <div class="alert alert-success" role="alert">
     <strong>{{session('info')}}</strong>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
 </div>
@endif
    @livewire('enterprise.register-enterprise')  
@stop
