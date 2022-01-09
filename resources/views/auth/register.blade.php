@extends('layouts.appadmin')



@section('content')
<h2 class="text-center" >Crear usuario</h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <small class="text-danger">Los campos con * son obligatorios</small>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}: *</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}: *</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}: *</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}: *</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="group" class="col-md-4 col-form-label text-md-right">Grupo: *</label>

                            <div class="col-md-6">
                                <input id="group" type="number" class="form-control" @error('description') is-invalid @enderror name="group" value="{{old('group')}}">
                                <div class="col-md-12 col-form-label text-md ">
                                    @error('group')
                                    <small class="text-danger" style="font-weight: bold;"">{{ $message }}</small>         
                                    @enderror
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Roles: *</label>
                            <div class="">
                                @foreach ($roles as $role)
                                <label class="col-md-12 col-form-label text-md">  
                                    {!! Form::radio('roles[]', $role->id,null, ['class'=>'mr-1']) !!}
                                    {{$role->name}}   
                                </label>
                                @endforeach 
                                <div class="col-md-12 col-form-label text-md ">
                                    @error('roles')
                                    <small class="text-danger" style="font-weight: bold;"">{{ $message }}</small>         
                                    @enderror
                                </div>
                            </div>
                        </div>

                        
    
                        @can('user.notificar')
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                Notificar
                            </label>
                        
                            <div class="col-md-6 col-form-label text-md">
                            <label >       
                                {!! Form::checkbox('send',null, null, ['class'=>'mr-1']) !!}
                                Enviar mensajes de notificación
                            </label> 
                            </div>
                        </div>
                        @endcan

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
