<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ProjectIndex extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $search;
    public $sort='period';
    public $order='desc'; 
    protected $listeners=['delete'];
    
    public function updatingSearch(){
        $this->resetPage();
      }

    
    public function render()
    {
        $projects=Project::where('name','LIKE','%'. $this->search .'%')->orWhere('period','LIKE','%'. $this->search .'%')->orderBy($this->sort,$this->order)->paginate();
        return view('livewire.project.project-index',compact('projects'));
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
   public function delete($id){
    $project = Project::find($id);
    $project->delete();
    $this->render();
   }
}
