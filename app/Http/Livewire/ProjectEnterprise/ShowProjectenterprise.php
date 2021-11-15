<?php

namespace App\Http\Livewire\ProjectEnterprise;

use App\Models\Document;
use App\Models\Payment;
use Livewire\Component;
use App\Models\ProjectEnterprise;


class ShowProjectenterprise extends Component
{
    public $project;
    public $payment;
    public $documents;
    protected $listeners=['render'=>'render'];
    public $idP;

    public function mount($id)
    {
        
        $this->idP=$id;
    }
    public function render()
    {
        //$this->project=ProjectEnterprise::find(1);
        $this->reset=['documents'];
        $this->project = ProjectEnterprise::find( $this->idP);
        $this->payment=$this->project->payment()->get();
        $this->documents= Document::OfType('App\Models\Payment')
        ->join('payments','payments.id',"=",'documents.imageable_id')
        ->join('project_enterprises','payments.project_enterprise_id','=','project_enterprises.id')
        ->where('payments.project_enterprise_id','=',$this->project->id)
        ->get();
    
        return view('livewire.project-enterprise.show-projectenterprise');
    }
}
