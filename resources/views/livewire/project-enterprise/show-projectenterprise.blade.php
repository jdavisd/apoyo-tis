<div>
  <div class="row justify-content-center">
    <div class="col-md-8">
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
