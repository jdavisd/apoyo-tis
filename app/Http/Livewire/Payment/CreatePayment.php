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

    public $payment;
    public $deliveries;
    
    protected $rules=[
        'deliveries' => 'required|mimes:pdf',
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

        return view('livewire.payment.create-payment');
    }
    public function store(Request $request){
        $this->validate();
        $payment=Payment::create([
            'project_enterprise_id' => $this->project->id,
            'details'=>$this->details,
            'status'=>'Por revisar'
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
          $this->emit('userStore'); 
          $this->reset(['details','deliveries','payment']);
          $this->emit('render');

        // $this->proyect->payment()->create([
        //     'details'=>$this->details,
        //     'date'=>$this->date,    
        //   ]
        //   );

    }
}
