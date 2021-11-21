<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolesIndex extends Component
{
    public  $roles; 
    protected $listeners=['delete'];
    public $hi;

    public function render()
    {
        $this->roles=Role::all()->whereNotIn('name',['Postulante','Admin']);
        return view('livewire.admin.roles-index');
    }
    public function delete($id){
        $role = Role::find($id);
        $role->delete();
        $this->render();
    }
}
