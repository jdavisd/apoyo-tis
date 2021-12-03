<?php

namespace App\Http\Livewire\Enterprise;

use App\Models\Enterprise;
use App\Models\ProjectEnterprise;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class ListEnterprise extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $search;
    public $idP=1;
   public $empresa;
    protected $listeners=['show'];
    public $sort='period';
    public $order='asc'; 
    public function updatingSearch(){
        $this->resetPage();
      }
    public function render()
    {
        $idP = $this->idP; 
       $socios=User::Where('users.enterprise_id','=',$idP)->get();
  
        $emp=Enterprise::join('documents','enterprises.id','=','documents.imageable_id')
        ->select('enterprises.*','documents.name as doc')
        ->Where('documents.imageable_type','=', 'App\Models\Enterprise')
        ->Where('enterprises.id','=', $idP)
        ->first();
        //dd($empresa);

        $enterprises = ProjectEnterprise::join('users','project_enterprises.users_id',"=",'users.id')
        ->join('enterprises', 'project_enterprises.enterprise_id', '=', 'enterprises.id')
        ->join('projects', 'project_enterprises.project_id', '=', 'projects.id')
        ->select('enterprises.short_name','enterprises.long_name', 'projects.period','users.name','enterprises.id')
        ->where('enterprises.short_name','LIKE','%'. $this->search .'%')
        ->orWhere('enterprises.long_name','LIKE','%'. $this->search .'%')->orderBy($this->sort,$this->order)->paginate();
        return view('livewire.enterprise.list-enterprise',compact('enterprises','socios','emp',));
    }
    public function order($by){ 
      if($by==$this->sort){
          if($this->order=='asc'){
            $this->order='desc';   
          }
           else{
            $this->order='asc';
           } 
    }
    else{
       $this->sort=$by;
       $this->order='asc'; 
    }
  }

  public function show ($id){
    //dd($id);
    
    $this->idP = $id;
  
    $this->render();
    
    //dd($this->idP);
  }

}
	