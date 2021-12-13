@extends('layouts.app')

@section('content')
@if (session('error'))
<div class="alert alert-danger" role="alert">
    <strong>{{session('error')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
</div>
@endif
<div class="text-center">
@livewire('enterprise.enterprise-edit',['id'=>$id])

</div>
@stop