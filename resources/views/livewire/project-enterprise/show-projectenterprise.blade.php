<div>
    <div>
    cabecera
    
    
    @livewire('payment.create-payment',['id'=>$idP])
    </div>
    {{$documents}}
    <div class="my-5">
       <h3>Plan de pagos</h3>
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
                <td><a class="btn btn-primary mx-2" href="{{route('file',$item->name)}}" target="blank_">Ver Documento</a></td>
                </tr>
              @endforeach
          </tbody>
      </table>
   </div>
   <div class="card-footer">
    {{$documents->links()}}
</div>
@livewireScripts
<script type="text/javascript">
  window.livewire.on('userStore', () => {
      $('#exampleModal').modal('hide');
  });
</script>
</div>
