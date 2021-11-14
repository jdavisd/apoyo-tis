<?php

namespace App\Http\Livewire\ProjectEnterprise;

use App\Models\Payment;
use Livewire\Component;
use App\Models\ProjectEnterprise;


class ShowProjectenterprise extends Component
{
    public $project;
    public $payment;
    public function mount($id)
    {
        $this->project=Payment::whereIn('project_enterprise_id',$id)->get();
       // $project=Payment::join('project_enterprises','payments.project_enterprise_id',"=",'project_enterprises.id')->where('payments.project_enterprise_id',$id)->get();
       
        //$this->project = ProjectEnterprise::find($id);
        //$this->payment=$this->project->payment();
    }
    public function render()
    {
        //$project=ProjectEnterprise::find($this->id);
        $project1=$this->project;
        return view('livewire.project-enterprise.show-projectenterprise',compact('project1'));
    }
}
