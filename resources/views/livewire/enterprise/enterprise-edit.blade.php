
<div>


    @livewireScripts
     <div class="row justify-content-center">
    {{$users}}
      <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong class="h5">Postular</strong></div>
                     <div class="card-body">
                         <form method="POST" action="{{route('empresa.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row my-3">
                                <label for=""class="col-md-4 text-md-right">Nombre Corto</label>
                                <div class="col-md-6">
                                  <input type="text"
                                    class="form-control  @error('short_name') is-invalid @enderror" name="short_name"  value="{{old('short_name',$enterprise->short_name)}}"  id="" aria-describedby="helpId" placeholder="">
                                   @error('short_name')
                                    <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                                                  @enderror
                                   </div>
                            </div> 
                             
    
    
    
    
                         
         <div class="row my-3">{!! Form::label('project_id', 'Proyecto', ['class' => 'col-md-4 text-md-right']) !!}
            <div class="col-md-6">
            {!! Form::select ('project_id', $project, $projectID, ['class' => 'form-control ' . ($errors->has('project_id') ? ' is-invalid' : null)]) !!}
            @error('project_id')
            <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
          @enderror
            </div>
              </div>
          
              <div class="row my-3">
                <label for=""class="col-md-4 text-md-right">Telefono</label>
                <div class="col-md-6">
                <input type=""class="form-control   @error('phone') is-invalid @enderror" name="phone" value=" {{old('phone',intval($enterprise->phone))}}" id="" aria-describedby="helpId" placeholder="">        
                @error('phone')
                <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
              @enderror
              </div>
              </div>
              <div class="row my-3">
                <label for=""class="col-md-4 text-md-right">Correo Electronico</label>
                <div class="col-md-6">
                <input type="email"
                class="form-control  @error('email') is-invalid @enderror" name="email" value="{{old('email',$enterprise->email)}}" id="" aria-describedby="helpId" placeholder="">
                @error('email')
                <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
              @enderror
              </div>
              </div>
           
              <div class="row my-3">
                <label for=""class="col-md-4 text-md-right">Nombre largo</label>
                <div class="col-md-6">
                <input type="text"
                class="form-control   @error('long_name') is-invalid @enderror" name="long_name"  value=" {{old('long_name',$enterprise->long_name)}}" id="" aria-describedby="helpId" placeholder="">
                @error('long_name')
                <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
              @enderror
              </div>
              </div>
              <div class="row my-3">
                <label for=""class="col-md-4 text-md-right">Direccion</label>
                <div class="col-md-6">
                <input type="text"
                class="form-control  @error('address') is-invalid @enderror" name="address" value=" {{old('address',$enterprise->address)}}" id="" aria-describedby="helpId" placeholder="">
                @error('address')
                <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
              @enderror
             </div>
              </div>
            
          
    
              <div class="row my-3">{!! Form::label('adviser_id', 'Consultor',['class' => 'col-md-4 text-md-right']) !!}
                <div class="col-md-6">
                {!! Form::select ('adviser_id', $adviser, null, ['class' => 'form-control ' . ($errors->has('adviser_id') ? ' is-invalid' : null)]) !!}
              
                  @error('adviser_id')
                  <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                @enderror
                </div>
              </div>
          <!--
              <div class="mb-3">
                <label for="" class="form-label">Socios</label>
                <input type="text"
                  class="form-control" name="partners" id="" aria-describedby="helpId" placeholder="">
             
              </div>
          -->
              <div class="row my-3">
                <label for=""class="col-md-4 text-md-right">tipo sociedad</label>
                <div class="col-md-6">
                <input type="text"
                class="form-control  @error('type') is-invalid @enderror" name="type" value="{{old('type',$enterprise->type)}}" id="" aria-describedby="helpId" placeholder="" >
                @error('type')
                <div class=""><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
              @enderror
               </div>
              </div>
              <div class="row my-3">
                <label for="" class="col-md-4 text-md-right">Logo (Reemplazara al actual)</label>
                <div class="col-md-6">
                <input type="file" class="form-control @error('logo') is-invalid @enderror " name="logo"  id="" aria-describedby="helpId" accept="image/*" placeholder="">
                @error('logo')
                  <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                      @enderror
                      
                                      </div>
              </div>
           
            <div>
                <div class="row my-3">
                    <div class="col-md-8 text-md-right">
                    <a class="btn btn-primary" href="{{asset('storage/logos').'/'.$logo->name}}" target="blank_">Visualizar Documento Actual</a>
                    </div>
                </div>
              <div class="row my-3">
              
                <label for="" class="col-md-4 text-md-right">Socios</label>      
                <div class="col-md-6">    
                              <button type="button" class="btn btn-outline-secondary form-control  " data-toggle="modal" data-target="#exampleModal">
                                  Añadir socios
                              </button> 
                                 
                              </div>        
                              <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Lista de postulantes</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true close-btn">×</span>
                                              </button>
                                          </div>
                                         <div class="modal-body">
                                    
                                     
              <input type="text" name="hola" id="" wire:model="search" class="form-control" placeholder="Ingrese nombre o correo">
            
           
              <div>
           
                <h5>Añadidos</h5>
                @if ($users->count())
                <div class="table table-light table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($users as $user)
                         <tr>
                             <td> {{$user->name}}</td>
                             <td>{{$user->email}}</td>
                         </tr>
                         @endforeach
                        </tbody>
                    </table>
                  </div>
             
              
                @else
                <div  class="card-body">
                    <strong>No hay postulantes añadidos</strong>
                </div>
                @endif 
            </div>
           
            @if ($students->count())
           <div class="table table-light table-responsive" >
              <table class="table table-light "
                <thead class="thead-light">
                     <tr>
                        <th>Nombre</th>
                         <th>Correo</th>
                         <th>Selecionar</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($students as $student)
                     <tr>
                      <td>{{$student->name}}</td>
                      <td>{{$student->email}}</td>
                      <td><div class="mt-1">
                       
                       
                        <label  class="inline-flex items-center">
                            {!! Form::checkbox('students[]', $student->id,null, ['class'=>'mr-1','wire:model'=>'level','wire:click'=>'levelClicked']) !!}
    
                        </label>
                    </div></td>
                    </tr>
                     @endforeach
                  
                 </tbody>
             </table>
              
           </div>
          
               <div class="card-footer">
                   {{$students->links()}}
               </div>
               
                   
               @else
                   <div  class="card-body">
                       <strong>No hay se añadio postulantes</strong>
                   </div>
             
               @endif
        
      
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-primary close-btn" data-dismiss="modal">Guardar</button>
                                              <!--<button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                                              <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>-->
                                          </div>
                                      </div>
                                  </div>
                              </div>
            
             <br>
            </div>
            @error('students')
            <small class="text-danger" style="font-weight: bold;"">Debe seleccionar entre 3 a 5 socios</small>         
          @enderror
                         
                                    <input name="" id="" class="btn btn-primary"  style="display: block; margin: 0 auto;"  type="submit" value="Guardar">
                           
                           
                       
                         
                    
                        
             
              <!--
              <div class="mb-3">
               <label >Logo</label>
               <br>
               <input  type="file" name="logo" id=""  >
               </div>    -->
            
              
          </form>
                            
                     </div>   
                </div>
            </div> 
        </div>    
      </div>   
                                
    </div> 