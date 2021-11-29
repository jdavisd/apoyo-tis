<div>
   
   
   <div>
    <button class ="btn btn-danger mx-1" wire:click="$emit('leave')" >Borrar</button></td>
    @livewireScripts
   </div>
  
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
     livewire.on('leave',()=>{

        Swal.fire({
  title: 'Estas seguro de salir?',
  text: "Si quedan menos de dos estudiantes la empresa sera eliminada !",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'Cancelar'
  
}).then((result) => {
    
 
  if (result.isConfirmed) {
           livewire.emit('leaveEnterprise')
           Swal.fire(
             'Salio de la empresa ',
           )
           
         }
});

     });


    
   </script>
   
</div>
