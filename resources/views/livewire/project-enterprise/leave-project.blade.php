<div>
   
   
   <div>
    <button class ="btn btn-danger mx-1 float-right mr-5" wire:click.prevent="canleave()" >Salirse</button></td>
    @livewireScripts
   </div>
  
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
     livewire.on('leave',()=>{

        Swal.fire({
  title: 'Estas seguro de salir?',
  text: "Si quedan menos de tres estudiantes la empresa sera eliminada !",
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
     <script>
      livewire.on('noPermitLeave' ,() =>{
  
        Swal.fire({
    icon: 'error',
    title: 'No pudes salir la empresa',
    text: 'El plazo de cambios se vencio',
   
  })
  
      })
  
  
     
    </script>   
   
</div>
