@extends('layouts.app')

@section('content')



<div class="row justify-content-center">
  <div class="col-md-8">
      <div class="card">
          <div class="card-header"><strong class="h5">Editar proyecto </strong></div>
          <div class="card-body">
            <form action="{{route('proyecto.update',$project->id)}}" method="POST" >
                @csrf
                @method('put')
                 
                  <div class="row my-3">
                    <label for="name" class="col-md-4 text-md-right" >Nombre proyecto</label>
                      <div class="col-md-6">
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                          value="{{old('name',$project->name)}}"  id="" aria-describedby="helpId" placeholder="">
                          @error('name')
                              <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                          @enderror
                      </div>
                  </div>
                  <div class="row my-3">
                      <label class="col-md-4 text-md-right" for="period">Gestion</label>
                      <div class="col-md-6">
                          <input class="form-control @error('period') is-invalid @enderror" type="text" name="period"
                          value="{{old('period',$project->period)}}"  id="" aria-describedby="helpId" placeholder="">
                          @error('period')
                              <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                          @enderror
                      </div>
                  </div>
                  <div class="row my-3">
                      <label class="col-md-4 text-md-right" for="code">Numero de pliego</label>
                      <div class="col-md-6">
                          <input class="form-control @error('code') is-invalid @enderror" type="text" name="code"
                          value="{{old('code',$project->code)}}"  id="" aria-describedby="helpId" placeholder="">
                          @error('code')
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