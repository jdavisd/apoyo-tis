@extends('layouts.app')

@section('content')
@if (session('infoUpdate'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{session('infoUpdate')}}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  
@endif
@livewire('project.project-index')
@stop