<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class IndexProject extends Component
{
   
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $search;
    public $sort='period';
    public $order='desc'; 
    
    public function updatingSearch(){
        $this->resetPage();
      }

    
    public function render()
    {
        $projects=Project::where('name','LIKE','%'. $this->search .'%')->orWhere('period','LIKE','%'. $this->search .'%')->orderBy($this->sort,$this->order)->paginate();
        return view('livewire.project.index-project',compact('projects'));
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
