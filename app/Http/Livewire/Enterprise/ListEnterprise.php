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
    public $sort='period';
    public $order='asc'; 
    public function updatingSearch(){
        $this->resetPage();
      }
    public function render()
    {
        $enterprises = ProjectEnterprise::join('users','project_enterprises.users_id',"=",'users.id')
        ->join('enterprises', 'project_enterprises.enterprise_id', '=', 'enterprises.id')
        ->select('enterprises.short_name','enterprises.long_name', 'enterprises.period','users.name')
        ->where('enterprises.short_name','LIKE','%'. $this->search .'%')
        ->orWhere('enterprises.long_name','LIKE','%'. $this->search .'%')->orderBy($this->sort,$this->order)->paginate();
        return view('livewire.enterprise.list-enterprise',compact('enterprises'));
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
