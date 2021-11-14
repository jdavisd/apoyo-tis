@extends('layouts.app')

@section('content')

{{-- @livewire('project-enterprise.show-projectenterprise',['id'=>$id]) --}}
@livewire('payment.create-payment',['id'=>$id])
@stop