<?php

namespace App\Http\Livewire\ProjectEnterprise;

use App\Models\Enterprise;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;



class LeaveProject extends Component
{
    protected $listeners=['leaveEnterprise'];


    public function render()
    {
        return view('livewire.project-enterprise.leave-project');
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
    // $enterprise_id=Auth::user()->enterprise_id;
         
    //     $count=User::where('enterprise_id',$enterprise_id)->get()->count();
    //     if($count<3) {
    //         //dd($enterprise_id);
    //         //Enterprise::find($enterprise_id)->delete();
    //         ProjectEnterprise::where('enterprise_id',$enterprise_id)->delete();
    //     }
    //     User::where('id',Auth::user()->id)->update(['enterprise_id' => NULL]); 
    //     return redirect()->route('user.home');


}
