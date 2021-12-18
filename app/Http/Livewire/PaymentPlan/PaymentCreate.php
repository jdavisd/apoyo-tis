<?php

namespace App\Http\Livewire\PaymentPlan;

use App\Models\ProjectEnterprise;
use App\Models\PaymentPlan;
use App\Models\Project;
use Livewire\Component;
use Carbon\Carbon;
class PaymentCreate extends Component
{
    public $dueDate,$description,$percentage,$amount,$ProjectEnterprise;
    protected $rules=[
        'dueDate' => 'required',
        'description'=>'required',
        'percentage'=>'required',
        'amount'=>'required',
    ];

    public function mount($id){
     $this->projectEnterprise=ProjectEnterprise::find($id);
    }
    public function render()
    {
        return view('livewire.payment-plan.payment-create');
    }
    public function store(){
        $this->validate();
        $project=Project::find($this->projectEnterprise->project_id);
        $currentlyDate = Carbon::now()->format('Y-m-d H:i:s');  
        if($currentlyDate>$project->datetime){
            $this->emit('noPermitPayment');
        }
        else{
            PaymentPlan::create([
            'dueDate' => $this->dueDate,
            'description'=>$this->description,
            'percentage'=>$this->percentage,
            'amount'=> $this->amount,
            'project_enterprise_id'=> $this->projectEnterprise->id,
            ]);
            $this->reset(['dueDate','description','percentage','amount']);
            $this->emit('renderP');
            $this->emit('createAlert');
        }
    }    
}
