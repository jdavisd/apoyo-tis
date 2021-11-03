
<div>


  @livewireScripts
  @if ($open)
   <div class="row justify-content-center "  ">
                        
                                   
            <input type="text" name="hola" id="" wire:model="search"  placeholder="Ingrese nombre o correo">
          
            {{$search}}
            
            <div wire:ignore.self class="modal  d-block " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog " role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="$set('open',false)">
                             <span aria-hidden="true close-btn">×</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        La grupo empresa  {{$enterprise->long_name}} le solicito unirse
                     </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="decline()" class="btn btn-secondary close-btn" data-dismiss="modal">Rechazar</button>
                        <button type="button" wire:click="acept()" class="btn btn-primary close-modal">Aceptar</button>
                    </div>
                  </div>
              </div>
           </div> 
         
            
    </div>   
    @endif                     
  </div> 