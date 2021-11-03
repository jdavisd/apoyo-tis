<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
       $this->level[]=Auth::user()->id;
       $users=User::whereIn('id',$this->level)->paginate();
       $students=User::where('name','LIKE','%'. $this->search .'%')->orWhere('email','LIKE','%'. $this->search .'%')->whereNotIn('id',[Auth::user()->id ])->role('Estudiante')->paginate();
       return view('livewire.user.list-user',compact('project','adviser','students','users'));
        
    }
    public function levelClicked()
    {
        
        
    
    }
}
