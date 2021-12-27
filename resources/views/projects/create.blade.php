@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
      <div class="card">
          <div class="card-header"><strong class="h5">Registrar proyecto </strong></div>
          <div class="card-body">
              <small class="text-danger">Los campos con * son obligatorios</small>
            <form method="POST" action="{{route('proyecto.store')}}">
                  @csrf
                  <div class="row my-3">
                    <label for="name" class="col-md-4 text-md-right" >Nombre proyecto: *</label>
                      <div class="col-md-6">
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                          value="{{old('name')}}"  id="" aria-describedby="helpId" placeholder="">
                          @error('name')
                              <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                          @enderror
                      </div>
                  </div>

                  <div class="row my-3">
                    <label class="col-md-4 text-md-right" for="period">Gestión: *</label>
                    <div class="col-md-6">
                        <select name='period' class="form-control @error('period') is-invalid @enderror" type="text" 
                        value="{{old('period')}}">
                            <option value='I/{{\Carbon\Carbon::now()->format('Y')}}'>I/{{\Carbon\Carbon::now()->format('Y')}}</option>
                            <option value='II/{{\Carbon\Carbon::now()->format('Y')}}'>II/{{\Carbon\Carbon::now()->format('Y')}}</option>
                        </select>
                        @error('period')
                              <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                          @enderror
                    </div>   
                </div>

                

                  <div class="row my-3">
                      <label class="col-md-4 text-md-right" for="code">Numero de pliego: *</label>
                      <div class="col-md-6">
                          <input class="form-control @error('code') is-invalid @enderror" type="text" name="code"
                          value="{{old('code')}}"  id="" aria-describedby="helpId" placeholder="">
                          @error('code')
                              <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                          @enderror
                      </div>
                  </div>
                  <div class="row my-3">
                    <label class="col-md-4 text-md-right" for="datetime">Fecha limite de entrega: *</label>
                    <div class="col-md-6">
                        <input class="form-control @error('datetime') is-invalid @enderror" type="datetime-local" name="datetime"
                        value="{{old('datetime')}}"  id="" aria-describedby="helpId" placeholder="">
                        @error('datetime')
                            <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                        @enderror
                    </div>
                </div>
                  <div class="row my-3">
                      <div class="col-md-7 text-md-right"> 
                          <button class="btn btn-primary" type="submit">Guardar</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>


@endsection