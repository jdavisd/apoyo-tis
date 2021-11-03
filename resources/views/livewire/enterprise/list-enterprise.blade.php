<div>
    <div class=" row justify-content-center">
        <strong class="cursor-pointer">This text</strong>
    <div class="card col-8">
       <div class="card-header">
           <input type="text" name="search" class="form-control" placeholder="Ingrese nombre de grupo empresa"wire:model="search" id="">
       </div>
       <div class="card-body">
           <table class="table table-striped">
               <thead>
                   <th style="cursor: pointer;"> Nombre corto</th>
                   <th>Nombre Largo</th>
                   <th>Gestion</th>
                   <th>Consultor</th>
               </thead>
           <tbody>
               @foreach ($enterprises as $enterprise)
               <tr>
                <td> {{$enterprise->short_name}} </td>
                <td> {{$enterprise->long_name}} </td>
                <td> {{$enterprise->period}} </td>
                <td> {{$enterprise->name}} </td>
            
               </tr>
               @endforeach
      
          </tbody>
        </table>
       </div>
   </div> 

</div>
  @livewireScripts
</div>
