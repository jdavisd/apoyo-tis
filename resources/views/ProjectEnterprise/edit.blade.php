@extends('layouts.app')

@section('content')
<div class="text-center">
@livewire('enterprise.enterprise-edit',['id'=>$id])

</div>
@stop