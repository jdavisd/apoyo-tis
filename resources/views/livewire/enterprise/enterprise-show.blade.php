<div>
    
<div wire:ignore.self class="modal fade"  wire:mode="open" id="detalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="width:1250px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
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
                          <label for="name" class="col-form-label">{{$empresa->short_name}}</label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="name" class="col-md-6 col-form-label text-md-right">Nombre Largo:</label>
                        <div class="col-md-3">
                          <label for="name" class="col-form-label">{{$empresa->long_name}}</label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="name" class="col-md-6 col-form-label text-md-right">Teléfono:</label>
                        <div class="col-md-3">
                          <label for="name" class="col-form-label">{{$empresa->phone}}</label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="name" class="col-md-6 col-form-label text-md-right">Correo:</label>
                        <div class="col-md-3">
                          <label for="name" class="col-form-label">{{$empresa->email}}</label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="name" class="col-md-6 col-form-label text-md-right">Sociedad:</label>
                        <div class="col-md-3">
                          <label for="name" class="col-form-label">{{$empresa->type}}</label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="name" class="col-md-6 col-form-label text-md-right">Socios:</label>
                        <div class="col-md-5"> 
                          @foreach ($socios as $item)    
                              <label class="col-form-label">{{(string)$item->name}}</label>
                          @endforeach           
                        </div>
                      </div>
                                                  
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label for="name"></label>
                      <div class="col-md-12">
                        <img src="{{asset('storage/logos').'/'.$empresa->doc}}" alt="" width="200" height="300">
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
</div>
