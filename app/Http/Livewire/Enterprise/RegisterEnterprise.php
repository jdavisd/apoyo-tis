<?php

namespace App\Http\Livewire\Enterprise;

use Livewire\Component;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Carbon\Carbon;
class RegisterEnterprise extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $level=[];
    public $hola;
    public $search; 
    public $open=true;
    public $selected;
    public function updatingSearch(){
        $this->resetPage();
      }
      public function updatingLevel(){
        $this->resetPage();
      }
      
    public function render()
    {
      
       $project = Project::latest()->first()->name;
       $this->selected= Project::latest()->first()->id;
       $adviser = User::role('Consultor')->get();   
       $adviser= $adviser->pluck('name','id');
       $this->level[]=Auth::user()->id;
       $users=User::whereIn('id',$this->level)->paginate();
       $students=User::where('name','LIKE','%'. $this->search .'%')
       ->where([['name','LIKE','%'. $this->search .'%'],['enterprise_id', NULL]])
       ->orWhere([['email','LIKE','%'. $this->search .'%'],['enterprise_id', NULL]])
       ->whereNotIn('id',[Auth::user()->id ])->role('Estudiante')->paginate();
       return view('livewire.enterprise.register-enterprise',compact('project','adviser','students','users'));        
    }
    public function levelClicked()
    {
        
        
    
    }
    public function verifyDate(){
      if(!$this->selected){
        $projectR = Project::all()->first();
        $this->selected=$projectR->id;
      }
      $project=Project::find($this->selected);
      $currentlyDate = Carbon::now()->format('Y-m-d H:i:s');  
      //dd($currentlyDate,$project->datetime);
      // dd($project->datetime);
      if($currentlyDate>$project->datetime){
         $this->emit('noPermit');
      }
   
  }
}
