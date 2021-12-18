<div>   
    
  <div class=" row justify-content-center">
  <div class="card col-12">
     <div class="card-header">
         <input type="text" name="search" class="form-control" placeholder="Ingrese nombre de grupo empresa"wire:model="search" id="">
     </div>
     <div class="card-body">
       <div class="table-repsonsive">
         <table class="table table-striped">
             <thead>
                 <th style="cursor: pointer;" wire:click="order('short_name')" >  Nombre corto  
           
                  @if ($sort=='short_name')
                  @if ($order=='desc')
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                    <path d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                  </svg>  
                  @else
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-up-alt" viewBox="0 0 16 16">
                    <path d="M3.5 13.5a.5.5 0 0 1-1 0V4.707L1.354 5.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 4.707V13.5zm4-9.5a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zm0 3a.5.5 0 0 1 0-1h3a.5.5 0 0 1 0 1h-3zm0 3a.5.5 0 0 1 0-1h5a.5.5 0 0 1 0 1h-5zM7 12.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5z"/>
                  </svg> 
                  @endif
              @else
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
              </svg>
              @endif
             
              </th>
    
              
                 
                
                 <th style="cursor: pointer;" wire:click="order('long_name')">Nombre Largo
                

                    @if ($sort=='long_name')
                        @if ($order=='desc')
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                          <path d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                        </svg>  
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-up-alt" viewBox="0 0 16 16">
                          <path d="M3.5 13.5a.5.5 0 0 1-1 0V4.707L1.354 5.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 4.707V13.5zm4-9.5a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zm0 3a.5.5 0 0 1 0-1h3a.5.5 0 0 1 0 1h-3zm0 3a.5.5 0 0 1 0-1h5a.5.5 0 0 1 0 1h-5zM7 12.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5z"/>
                        </svg> 
                        @endif
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                      <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    @endif
              </th>
                 <th style="cursor: pointer;" wire:click="order('period')">Gestion
             
                  @if ($sort=='period')
                  @if ($order=='desc')
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                    <path d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                  </svg>  
                  @else
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-up-alt" viewBox="0 0 16 16">
                    <path d="M3.5 13.5a.5.5 0 0 1-1 0V4.707L1.354 5.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 4.707V13.5zm4-9.5a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zm0 3a.5.5 0 0 1 0-1h3a.5.5 0 0 1 0 1h-3zm0 3a.5.5 0 0 1 0-1h5a.5.5 0 0 1 0 1h-5zM7 12.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5z"/>
                  </svg> 
                  @endif
              @else
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
              </svg>
              @endif
              </th>
                 <th style="cursor: pointer;" wire:click="order('name')">Consultor
              
             
                  @if ($sort=='name')
                  @if ($order=='desc')
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                    <path d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                  </svg>  
                  @else
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-up-alt" viewBox="0 0 16 16">
                    <path d="M3.5 13.5a.5.5 0 0 1-1 0V4.707L1.354 5.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 4.707V13.5zm4-9.5a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zm0 3a.5.5 0 0 1 0-1h3a.5.5 0 0 1 0 1h-3zm0 3a.5.5 0 0 1 0-1h5a.5.5 0 0 1 0 1h-5zM7 12.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5z"/>
                  </svg> 
                  @endif
              @else
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
              </svg>
              @endif
              </th>
              <th>
                AcciÃ³n
              </th>
             </thead>
         <tbody>
             @foreach ($enterprises as $enterprise)
             <tr>
              <td> {{$enterprise->short_name}} </td>
              <td> {{$enterprise->long_name}} </td>
              <td> {{$enterprise->period}} </td>
              <td> {{$enterprise->name}} </td>
              <td>   
                  <button type="button" class="btn btn-primary" wire:click="show({{$enterprise->id}})" data-toggle="modal" data-target="#detalles" >Detalles</button>
              </td>
          
             </tr>
             @endforeach
    
        </tbody>
      </table>
    </div>
     </div>
     <div class="card-footer">
      {{$enterprises->links()}}
  </div>
  
 </div> 

</div>
@if ($socios->count())
<div wire:ignore.self class="modal fade"  wire:mode="open" id="detalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document" style="width:1250px;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true close-btn">x</span>
            </button>
        </div>
       <div class="modal-body">
            <form>
              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  
                  <div class="form-group row">
                    <label for="name" class="col-md-6 col-form-label text-md-right">Nombre Corto:</label>
                    <div class="col-md-3">
                      <label for="name" class="col-form-label">{{$emp->short_name}}</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-md-6 col-form-label text-md-right">Nombre Largo:</label>
                    <div class="col-md-3">
                      <label for="name" class="col-form-label">{{$emp->long_name}}</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-md-6 col-form-label text-md-right">Telefono:</label>
                    <div class="col-md-3">
                      <label for="name" class="col-form-label">{{$emp->phone}}</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-md-6 col-form-label text-md-right">Correo:</label>
                    <div class="col-md-3">
                      <label for="name" class="col-form-label">{{$emp->email}}</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-md-6 col-form-label text-md-right">Sociedad:</label>
                    <div class="col-md-3">
                      <label for="name" class="col-form-label">{{$emp->type}}</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-6 col-form-label text-md-right">Socios:</label>
                    <div class="col-md-5"> 
                      @foreach ($socios as $item)    

                          <label class="col-form-label">{{$item->name}}</label>
                      @endforeach           
                    </div>
                  </div>
                                              
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label for="name"></label>
                  <div class="col-md-12">
                    <img src="{{asset('storage/logos').'/'.$emp->doc}}" alt="" width="200" height="300">
                  </div>
                </div> 
              </div>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
            {{-- <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Agregar</button> --}}
        </div>
    </div>
</div>
</div>
@endif

@livewireScripts
</div>
