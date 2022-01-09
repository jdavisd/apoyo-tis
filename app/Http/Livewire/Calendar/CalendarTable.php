<?php

namespace App\Http\Livewire\Calendar;

use Livewire\Component;
use App\Models\Calendar;
use App\Models\Project;
use Carbon\Carbon;
use App\Models\ProjectEnterprise;

class CalendarTable extends Component
{
    public $idP,$calendar;
    protected $listeners=['delete','renderC'=>'render'];
    public $rules=
    ['calendar.dueDate'=>['required','before:4 months','after: tomorrow'],
     'calendar.sprint'=>'required|numeric|between:1,100',
     'calendar.description'=>['required','regex:/^[a-zA-Z,0-9, ]+$/']
     ];
    public function mount($id){
       $this->projectEnterprise=ProjectEnterprise::find($id);
       $this->idP=$id;
       $this->calendar=new Calendar();
    }
    public function render()
    {
        $calendarPlan=Calendar::where('project_enterprise_id',$this->idP)->get();
        return view('livewire.calendar.calendar-table',compact('calendarPlan'));
    }
    public function delete(Calendar $calendar){
        $calendar->delete();
        $this->render();
      }
      public function edit(Calendar $calendar){
          $this->calendar=$calendar;
      }
      public function update(){
        $project=Project::find($this->projectEnterprise->project_id);
        $currentlyDate = Carbon::now()->format('Y-m-d H:i:s');  
        if($currentlyDate>$project->datetime){
              $this->emit('noPermitCalendar');
        }
        else{  
          $this->validate();
          $this->calendar->save();
          $this->emit('hideEditCalendar');
          $this->emit('editAlertCalendar');
          $this->render();
        }   
      }
}
