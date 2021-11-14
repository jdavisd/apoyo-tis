<?php

namespace App\Http\Livewire\ProjectEnterprise;


use App\Models\Enterprise;
use App\Models\ProjectEnterprise;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
class IndexProjectenterprise extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $search;
    public $sort='period';
    public $order='asc'; 
    public function updatingSearch(){
        $this->resetPage();
      }
    public function render()
    {
         $user =Auth::user();
         if($user->hasRole('Consultor')){
            $projects =User::find(Auth::user()->id) 
            
      ->join('project_enterprises','users.id',"=",'project_enterprises.users_id')
       ->join('enterprises', 'project_enterprises.enterprise_id', '=', 'enterprises.id')
       ->join('projects', 'project_enterprises.project_id', '=', 'projects.id')
       ->select('enterprises.short_name','project_enterprises.status', 'projects.period','projects.name','project_enterprises.users_id','project_enterprises.id')
       ->where([['enterprises.short_name','LIKE','%'. $this->search .'%'],['project_enterprises.users_id', Auth::user()->id]])
       ->orWhere([['projects.name','LIKE','%'. $this->search .'%'],['project_enterprises.users_id', Auth::user()->id]])
            
            ->orderBy($this->sort,$this->order)->paginate();
            $proyectid=ProjectEnterprise::select('id');
            
 

        }
        return view('livewire.project-enterprise.index-projectenterprise',compact('projects'));
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

}
