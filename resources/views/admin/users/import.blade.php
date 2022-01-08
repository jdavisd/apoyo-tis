@extends('layouts.appadmin')





@section('content')
<h2 class="text-center">Importar usuarios</h2>
@if (session('info'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('info')}}</strong>
    </div>
@endif
<section style="padding-top:60;">
    <div class="container">
       <div class="row  justify-content-center">
          <div class="col-md-8 offset-md3">
              <div class="card ">
                 <!-- <div class="card-header">
                     <h3>Importar usuarios</h3>
                  </div>-->
                  <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route('admin.usersimport.store')}}">

                      @csrf
                      <div class="form-group">
                          <label for="file">
                             Subir archivo csv
                          </label>
                          
                          <input class="form-control @error('file') is-invalid @enderror" id="file" type="file" name="file" id="file" value="subir archivo" accept=".csv,.xlsx">
                            
                          @error('file')
                          <div class="row"><small class="text-danger" style="font-weight: bold;"">{{$message}}</small></div>         
                        @enderror
                    
                        @if (session()->has('failures'))
                            <table class="table table-danger table-responsive">
                                <thead>
                                    <tr>
                                    <th>
                                        Fila
                                    </th>
                                    <th>Atributos</th>
                                    <th>Errores</th>
                                    <th>Valor</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach (session()->get('failures') as $error)
                                    <tr>
                                        <td>{{$error->row()}}</td>
                                        <td>{{$error->attribute()}}</td>
                                        <td>
                                            <ul>
                                                @foreach ($error->errors() as $e)
                                                    <li>{{$e}}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{$error->values()[$error->attribute()]}}</td>
                                    </tr> 
                                    @endforeach
                                 
                                </tbody>
                            </table>
                        @endif
                        <br>
                        <label>Asignar Rol</label> 
                          <br>
                          @foreach ($roles as $role)
                          <div>
                              <label >
                                  {!! Form::radio('roles[]', $role->id,null, ['class'=>'mr-1']) !!}
                                  {{$role->name}}
                              
                              </label>                          
                          </div>
                          @endforeach
                          @error('roles')
                          <small class="text-danger" style="font-weight: bold;"">Debe seleccionar un rol</small>         
                          @enderror
                          <div>
                              <label >
                                  Notificar
                              </label>
                              <br>
                            <label >       
                                {!! Form::checkbox('send',null, null, ['class'=>'mr-1']) !!}
                               Enviar mensajes de notificación
                            </label> 
                          </div>
                         
                          <button type="submit" class="btn btn-primary">Importar</button>
                      </div>

                    </form>

                  </div>
              </div>

          </div>
       </div>
    </div>


 </section>
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop