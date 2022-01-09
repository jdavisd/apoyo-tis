<?php

namespace App\Http\Livewire\Payment;

use App\Models\Document;
use App\Models\Payment;
use Livewire\Component;
use App\Models\ProjectEnterprise;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class EditPayment extends Component
{


    
    use WithFileUploads;
    public $project;
    public $enterprise;
    public $details;
    public $date;
    public $payment;
    public $deliveries;
    
    protected $rules=[
        'deliveries' => 'required',
        'date'=>'required',  
        'details'=>'required'

    ];
    public function updated($propertyName){
        $this->validateOnly($propertyName);

    }
    public function mount($id)
    {
        $this->project = ProjectEnterprise::find($id);
        $this->enterprise = $this->project->enterprise()->first();
    }
    public function render()
    {
        return view('livewire.payment.edit-payment');
    }
    public function update(){
      
    }
}
