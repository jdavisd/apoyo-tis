<?php

namespace App\Http\Livewire\ProjectEnterprise;

use App\Models\Enterprise;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\ProjectEnterprise;
use Carbon\Carbon;
use App\Models\Project;



class LeaveProject extends Component
{
    protected $listeners=['leaveEnterprise'];
    public $idP;

    public function render()
    {
        return view('livewire.project-enterprise.leave-project');
    }
    public function mount($id){
      $this->idP=$id;
    }
    public function canleave(){
        $project=ProjectEnterprise::find($this->idP)->project;
        // dd($project->id);
        $currentlyDate = Carbon::now()->format('Y-m-d H:i:s');  
        if($currentlyDate>$project->datetime){
           $this->emit('noPermitLeave');
        }
        else{
            $this->emit('leave');
        }

    }

    public function leaveEnterprise()
    {
        $enterprise_id=Auth::user()->enterprise_id;
        $count=User::where('enterprise_id',$enterprise_id)->get()->count();
        if($count==3) {

            $count=User::where('enterprise_id',$enterprise_id)->get();
            foreach($count as $user){
                User::where('id',$user->id)->update(['enterprise_id' => NULL]);
            }
            Enterprise::find($enterprise_id)->delete();
        }else{
            User::where('id',Auth::user()->id)->update(['enterprise_id' => NULL]);
        }
        
        return redirect()->route('user.home');
    }  

}
