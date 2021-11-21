<div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
        Adicionar
    </button>

    <!-- Modal -->
    {{$idD}}
    <div wire:ignore.self class="modal fade"  wire:mode="open" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Esta seguro de eliminar este usuario </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
               <div class="modal-body">
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">NO</button>
                    <button type="button" wire:click.prevent="delete()"  data-dismiss="modal" class="btn btn-primary close-modal" >SI</button>
                </div>
            </div>

        </div>

    </div>
    @livewireScripts
    <script type="text/javascript">
        window.livewire.on('hideModal', () => {
            $('#exampleModal').modal('hide');
        });
      </script>
</div>
