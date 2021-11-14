<?php

namespace App\Http\Livewire\Payment;

use App\Models\Document;
use App\Models\Payment;
use Livewire\Component;
use App\Models\ProjectEnterprise;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class CreatePayment extends Component
{
    use WithFileUploads;
    public $project;
    public $enterprise;
    public $details;
    public $date;
    public $payment;
    public $deliveries;
    
    public function mount($id)
    {
        $this->project = ProjectEnterprise::find($id);
        $this->enterprise = $this->project->enterprise()->first();
    }
    public function render()
    {
        return view('livewire.payment.create-payment');
    }
    public function store(Request $request){
    
        $payment=Payment::create([
            'project_enterprise_id' => $this->project->id,
            'date'=>$this->date,  
            'details'=>$this->details
          ]);
          if(!$this->deliveries==null){
              $var = $this->enterprise->short_name.'.'.$this->deliveries->getClientOriginalName();
            Document::create([
                'name' => $var,
                'imageable_id'=>$payment->id,  
                'imageable_type'=>Payment::class    
            ]);
            $this->deliveries->storeAs('Pagos',$var,'public');
          }


        // $this->proyect->payment()->create([
        //     'details'=>$this->details,
        //     'date'=>$this->date,    
        //   ]
        //   );
    }
}
