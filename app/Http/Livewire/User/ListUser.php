<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Project;
use App\Models\User;

use Livewire\WithPagination;
class ListUser extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $level=[];
    public $hola;
    public $search; 
    public $open=true;
    public function updatingSearch(){
        $this->resetPage();
      }
    public function render()
    {
       $project = Project::pluck('name','id');
       $adviser = User::role('Consultor')->get();   
       $adviser= $adviser->pluck('name','id');
       $students = User::role('Estudiante')->get();
       $users=User::whereIn('id',$this->level)->paginate();
       //return view('livewire.admin.users-index',compact('users'));
      // ->whereNotIn('id', [1, 2, 3])
       $students=User::where('name','LIKE','%'. $this->search .'%')->orWhere('email','LIKE','%'. $this->search .'%')->role('Estudiante')->paginate();

       return view('livewire.user.list-user',compact('project','adviser','students','users'));
        
    }
    public function levelClicked()
    {
        
        
    
    }
}
