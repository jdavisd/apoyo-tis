<?php

namespace App\Http\Livewire\Enterprise;

use Livewire\Component;
use App\Models\Project;
use App\Models\User;
use App\Models\ProjectEnterprise;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use Livewire\WithPagination;

class EnterpriseEdit extends Component
{
   
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $level=[];
    public $hola;
    public $search; 
    public $open=true;
    public $users;

    public $idP;
    public function updatingSearch(){
        $this->resetPage();
      }
     
    public function mount($id)
    {
        
        $this->idP=$id;
        $this->level=User::where('enterprise_id','=',$this->idP)->pluck('id')->toArray();
    }
    
 
    public function render()
    {
       $this->project = Project::pluck('name','id');
       $this->projectID=ProjectEnterprise::where('enterprise_id',$this->idP)->get('project_id');
      
       $adviser = User::role('Consultor')->get();   
       $adviser= $adviser->pluck('name','id');

       
       $this->users=User::whereIn('id',$this->level)->get();
      
         $this->project1 = ProjectEnterprise::find( $this->idP);
         $enterprise = $this->project1->enterprise()->first();
        //$this->users=User::whereIn('id',$this->level)->get();
        
       $this->logo= Document::OfType('App\Models\Enterprise')->where('imageable_id','=',$enterprise->id)->first();
       
       //$this->level=User::where('enterprise_id','=',$this->idP)->get();
       $students=User::where('name','LIKE','%'. $this->search .'%')
       ->where([['name','LIKE','%'. $this->search .'%'],['enterprise_id',NULL]])
       ->orWhere([['email','LIKE','%'. $this->search .'%'],['enterprise_id', NULL]])
       ->role('Estudiante')->paginate();      
       
       return view('livewire.enterprise.enterprise-edit',compact('adviser','students','enterprise')); 
    }
    public function levelClicked()
    {
      $this->users=User::whereIn('id',$this->level)->get();
       // $this->render();
    
    }
}
