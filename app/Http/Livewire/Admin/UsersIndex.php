<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $search;
    protected $listeners=['delete'];
    
    public function updatingSearch(){
      $this->resetPage();
    }

    public function render()
    {
        $users=User::where('name','LIKE','%'. $this->search .'%')->orWhere('email','LIKE','%'. $this->search .'%')->paginate();
        return view('livewire.admin.users-index',compact('users'));
    }
    public function delete($id){
      $user = User::find($id);
      $user->delete();
      $this->render();
  }
}
