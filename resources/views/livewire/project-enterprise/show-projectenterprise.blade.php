<div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div>
        <h1>{{$enterprise->short_name}}</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
            Información
        </button>
        <!-- Modal -->
        <div wire:ignore.self class="modal fade"  wire:mode="open" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true close-btn">×</span>
                        </button>
                    </div>
                   <div class="modal-body">
                     
                        <form>
                            <div class="form-group">
                              <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre Corto:</label>
                                <div class="col-md-3">
                                  <label for="name" class="col-form-label">{{$enterprise->short_name}}</label>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre Largo:</label>
                                <div class="col-md-3">
                                  <label for="name" class="col-form-label">{{$enterprise->long_name}}</label>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Telefono:</label>
                                <div class="col-md-3">
                                  <label for="name" class="col-form-label">{{$enterprise->phone}}</label>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Correo:</label>
                                <div class="col-md-3">
                                  <label for="name" class="col-form-label">{{$enterprise->email}}</label>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Sociedad:</label>
                                <div class="col-md-3">
                                  <label for="name" class="col-form-label">{{$enterprise->type}}</label>
                                </div>
                              </div>  
                              @foreach ($socios as $item)
                                  
                              @endforeach
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                        <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
        <div class="card">
          <div class="card-header">
            <strong class="h3">Propuestas</strong>
          </div>
          <div class="card-body">
            <div class="col">
              <label class="col-md text-md-left" for="document">Parte A:</label>
            </div>
            <div class="col">
              <label class="col-md text-md-left" for="document">Parte B:</label>
            </div>
            <div class="col">
              <label class="col-md text-md-left" for="document">Contrato:</label>
            </div>
          </div>  
        </div>
    </div>
  </div>
    <div>
      <h3>Plan de pagos</h3>
    @livewire('payment.create-payment',['id'=>$idP])
    </div>
    <div class="my-5">
        <table class="table table-light">
            <thead class="thead-light">
              <tr>
                  <th>Fecha</th>
                  <th>Detalles</th>
                  <th>Entregables</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($documents as $item)
              <tr>
                <td>{{$item->date}}</td>
                <td>{{$item->details}}</td>
                <td><a class="btn btn-primary mx-2" href="{{route('file',$item->name)}}">Descargar</a></td>
                </tr>
              @endforeach
          </tbody>
      </table>
   </div>
   <div class="card-footer">
    
</div>
@livewireScripts
<script type="text/javascript">
  window.livewire.on('userStore', () => {
      $('#exampleModal').modal('hide');
  });
</script>
</div>
