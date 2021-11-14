@extends('layouts.app')

@section('content')
<div class="text-center">
@livewire('project-enterprise.show-projectenterprise',['id'=>$id])
@livewire('payment.create-payment',['id'=>$id])
</div>
@stop