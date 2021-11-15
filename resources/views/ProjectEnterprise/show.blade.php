@extends('layouts.app')

@section('content')
<div class="text-center">
@livewire('project-enterprise.show-projectenterprise',['id'=>$id])

</div>
@stop