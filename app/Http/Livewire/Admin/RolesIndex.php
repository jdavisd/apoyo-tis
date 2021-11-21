<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
class RolesIndex extends Component
{
    protected $paginationTheme='bootstrap';
    protected $listeners=['delete'];
    public $hi;

    public function render()
    {
        $roles=Role::whereNotIn('name',['Postulante','Admin'])->paginate();
        return view('livewire.admin.roles-index',compact('roles'));
    }
    public function delete($id){
        $role = Role::find($id);
        $role->delete();
        $this->render();
    }
}
