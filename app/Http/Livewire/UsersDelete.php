<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;


class UsersDelete extends Component
{
     public $idD;
    public function mount($id)
    {
      $this->idD=$id;
    }
    public function render()
    {
        return view('livewire.users-delete');
    }
    public function delete(){

        $user = User::find($this->idD);
        $user->delete();
        $this->emit('render');

    }
}
