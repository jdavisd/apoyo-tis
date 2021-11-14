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

    public function mount($id)
    {
        $this->project = ProjectEnterprise::find($id);
        $this->payment=$this->project->payment()->get();
        $this->documents= Document::OfType('App\Models\Payment')
        ->join('payments','payments.id',"=",'documents.imageable_id')
        ->join('project_enterprises','payments.project_enterprise_id','=','project_enterprises.id')
        ->where('project_enterprises.id','=',$this->project->id)
        ->get();
    }
    public function render()
    {
        //$this->project=ProjectEnterprise::find(1);
        $project1=$this->project;
        return view('livewire.project-enterprise.show-projectenterprise');
    }
}
