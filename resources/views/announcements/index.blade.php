@extends('layouts.app')

@section('content') 
@if (Auth::user()->notification)
@livewire('user.notification-user')    
@endif

@if (session('info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session('info')}}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  
@endif
@if (session('infoUpdate'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{session('infoUpdate')}}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  
@endif

@if (session('infoDelete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{session('infoDelete')}}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  
@endif

@livewire('announcement.announcements-index')    

@stop
