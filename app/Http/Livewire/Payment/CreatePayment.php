<?php

namespace App\Http\Livewire\Payment;

use Livewire\Component;
use App\Models\ProjectEnterprise;

class CreatePayment extends Component
{
    public $proyect;
    public $details;
    public $date;
    public $deliveries;
    public function mount($id)
    {
        $this->project = ProjectEnterprise::find($id);
    }
    public function render()
    {
        return view('livewire.payment.create-payment');
    }
    public function store(){

        
        $this->proyect->payment()->create([
            'details'=>$this->details,
            'date'=>$this->date,    
          ]
          );
    }
}
