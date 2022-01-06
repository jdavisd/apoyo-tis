<?php

namespace App\Http\Livewire\Calendar;

use Livewire\Component;
use App\Models\Calendar;
use App\Models\ProjectEnterprise;
use App\Models\PaymentPlan;
use App\Models\Project;
use Carbon\Carbon;
class CalendarCreate extends Component
{
    
    public $dueDate,$description,$sprint,$ProjectEnterprise;
    protected $rules=[
        'dueDate' => ['required','before:4 months','after: tomorrow'],
        'description'=>'required',
        'sprint'=>'required|numeric|between:1,10',
    ];

    public function mount($id){
     $this->projectEnterprise=ProjectEnterprise::find($id);
    }
    public function render()
    {
        return view('livewire.calendar.calendar-create');
    }
    public function store(){
        $this->validate();
        $project=Project::find($this->projectEnterprise->project_id);
        $currentlyDate = Carbon::now()->format('Y-m-d H:i:s');  
        if($currentlyDate>$project->datetime){
            $this->emit('noPermitCreateCalendar');
        }
        else{
            Calendar::create([
            'dueDate' => $this->dueDate,
            'description'=>$this->description,
            'sprint'=>$this->sprint,
            'project_enterprise_id'=> $this->projectEnterprise->id,
            ]);
            $this->reset(['dueDate','description','sprint']);
            $this->emit('renderC');
            $this->emit('hideCreateCalendar');
            $this->emit('createAlertCalendar');
           
        }
    }    
}
