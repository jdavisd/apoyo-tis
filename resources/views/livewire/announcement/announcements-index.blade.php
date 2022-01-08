<div>
@if ($documents->count())
<div>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2">
            @foreach ($documents as $doc)
                <div class="col mb-4">
                    <div class= "card h-100" >
                        <div class="card-header">
                            <label  class="card-title h5"><strong>{{$doc->title}}</strong></label>
                        </div>
                        <div class="card-body">  
                            <p class="card-text">{{$doc->code}}</p>
                            <p class="card-text">{{$doc->period}}</p>
                            <p class="card-text">{{$doc->description}}</p>
                            @if ($doc->document_id)
                            <div class="row align-self-end"  >
                                @can('anuncio.document')
                                    <a class="btn btn-primary mx-2" href="{{asset('storage/anuncios').'/'.$doc->name}}" target="blank_">Ver Documento</a>
                                @endcan
                                @can('anuncio.destroy')
                                    <button class ="btn btn-danger mx-1" wire:click="$emit('deleteUser',{{$doc->document_id}})" >Borrar</button>
                                @endcan
                                @can('anuncio.edit')
                                    <a class="btn btn-primary mx-2" href="{{route('anuncio.edit',$doc->document_id)}}">Editar</a>    
                                @endcan
                            </div> 
                            @endif
                            
                        </div>          
                    </div>          
                </div>
            @endforeach  
        {{-- {{$documents->links()}} --}}
        </div>
    </div>
    
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <script>
            livewire.on('deleteUser',  userID=>{
        
               Swal.fire({
         title: 'Estas seguro?',
         text: "No podras revertir los cambios!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#616871',
         cancelButtonText: 'Cancelar',
         confirmButtonText: 'Si'
        }).then((result) => {
         if (result.isConfirmed) {
           Livewire.emitTo('announcement.announcements-index','delete',userID);
           Swal.fire(
             'Eliminado!',
             'La publicación ha sido eliminada.'
           )
         }
        });
        
            })
        
        
           
          </script>

</div>

@else
<div  class="text-center">
    <h3>Aun no se ha realizado ninguna publicación</h3>
</div>
@endif
</div>
