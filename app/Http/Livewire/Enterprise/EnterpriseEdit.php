<?php

namespace App\Http\Livewire\Enterprise;

use Livewire\Component;

use App\Models\User;
use App\Models\ProjectEnterprise;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use Livewire\WithPagination;
use Carbon\Carbon;
use App\Models\Project;

class EnterpriseEdit extends Component
{
   
    use WithPagination;
    protected $paginationTheme='bootstrap';
   
    public $level;
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
        $this->users=User::whereIn('id',$this->level)->get();
        //dd($this->level);

    }
    public function render()
    {
     
       
       $this->projectID=ProjectEnterprise::where('enterprise_id',$this->idP)->pluck('project_id');
       $this->project = Project::find($this->projectID)->pluck('name','id');
       $this->adviserID=ProjectEnterprise::where('users_id',$this->idP)->pluck('users_id');
       $adviser = User::role('Consultor')->get();   
       $adviser= $adviser->pluck('name','id');
        $this->project1 = ProjectEnterprise::find( $this->idP);
        $enterprise = $this->project1->enterprise()->first();
       $this->logo= Document::OfType('App\Models\Enterprise')->where('imageable_id','=',$enterprise->id)->first();
       
       $students=User::where('name','LIKE','%'. $this->search .'%')
       ->where([['name','LIKE','%'. $this->search .'%'],['enterprise_id',NULL]])
       //->orWhere([['name','LIKE','%'. $this->search .'%'],['enterprise_id',$enterprise->id ]])
       ->orWhere([['email','LIKE','%'. $this->search .'%'],['enterprise_id',NULL ]])
       //->orWhere([['email','LIKE','%'. $this->search .'%'],['enterprise_id',$enterprise->id ]])
       ->role('Estudiante')->paginate();      
       
       return view('livewire.enterprise.enterprise-edit',compact('adviser','students','enterprise')); 
    }
    public function levelClicked()
    {
        
        $this->users=User::whereIn('id',$this->level)->get();
    
    }
 
} 