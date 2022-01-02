<?php

namespace App\Http\Livewire\PaymentPlan;

use App\Models\PaymentPlan;
use Livewire\Component;
use App\Models\Project;
use Carbon\Carbon;
use App\Models\ProjectEnterprise;
class Payment extends Component
{
    public $idP,$payment;
    protected $listeners=['delete','renderP'=>'render'];
    public $rules=
    ['payment.dueDate'=>['required','before:4 months','after: tomorrow'],
     'payment.percentage'=>'required',
     'payment.amount'=>'required',
     'payment.description'=>'required'
     ];
    public function mount($id){
       $this->projectEnterprise=ProjectEnterprise::find($id);
       $this->idP=$id;
       $this->payment=new PaymentPlan();
    } 
    public function render()
    {
        $paymentPlan=PaymentPlan::where('project_enterprise_id',$this->idP)->get();
        return view('livewire.payment-plan.payment',compact('paymentPlan'));
    }
    public function delete(PaymentPlan $payment){
      $payment->delete();
      $this->render();
    }
    public function edit(PaymentPlan $payment){
        $this->payment=$payment;
    }
    public function update(){
      $project=Project::find($this->projectEnterprise->project_id);
      $currentlyDate = Carbon::now()->format('Y-m-d H:i:s');  
      if($currentlyDate>$project->datetime){
            $this->emit('noPermitPayment');
      }
      else{  
        $this->validate();
        $this->payment->save();
        $this->emit('editAlert');
        $this->render();
      }  
    
    }
}
