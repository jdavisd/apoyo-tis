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
    
    public $idP=2;
    protected $listeners=['show'];
    public $sort='period';
    public $order='asc'; 
    public function updatingSearch(){
        $this->resetPage();
      }
    public function render()
    {
      $socios=User::Where('users.enterprise_id','=',$this->idP)->get('name');
        $empresa=ProjectEnterprise::join('enterprises','project_enterprises.enterprise_id','=','enterprises.id')
        ->join('documents','project_enterprises.id','=','documents.imageable_id')
        ->select('enterprises.short_name','enterprises.long_name','enterprises.id','enterprises.phone','enterprises.email','enterprises.type','documents.name as doc')
        ->where('documents.imageable_type','=', 'App\Models\Enterprise')
        ->where('project_enterprises.id','=', $this->idP)
        ->first();

        $enterprises = ProjectEnterprise::join('users','project_enterprises.users_id',"=",'users.id')
        ->join('enterprises', 'project_enterprises.enterprise_id', '=', 'enterprises.id')
        ->join('projects', 'project_enterprises.project_id', '=', 'projects.id')
        ->join('documents','project_enterprises.id','=','documents.imageable_id')
        ->select('enterprises.short_name','enterprises.long_name', 'projects.period','users.name','documents.name as doc','enterprises.id','enterprises.phone','enterprises.email','enterprises.type')
        ->where('enterprises.short_name','LIKE','%'. $this->search .'%')
        ->orWhere('enterprises.long_name','LIKE','%'. $this->search .'%')->orderBy($this->sort,$this->order)->paginate();
        return view('livewire.enterprise.list-enterprise',compact('enterprises','empresa','socios'));
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
    
    $this->idP = $id;
    $this->render();
    // dd($this->socios);
  }

}
