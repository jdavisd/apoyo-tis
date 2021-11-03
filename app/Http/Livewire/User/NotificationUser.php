<?php

namespace App\Http\Livewire\User;

use App\Models\Enterprise;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class NotificationUser extends Component
{
    public $open=true;
    public $search;
    public  $enterpriseNotification;
    public function render()
    {
        $this->enterpriseNotification=Auth::user()->notification;
        if($this->enterpriseNotification){
            $enterprise=Enterprise::find($this->enterpriseNotification);        
        }
        return view('livewire.user.notification-user',compact('enterprise'));
    }
    public function decline(){
        $user=Auth::user()->id;
        User::where('id',$user)->update(['notification'=>null]);
        $this->search=false;
    }
    public function acept(){

        $user=Auth::user()->id;
        User::where('id',$user)->update(['notification'=>null]);
        User::where('id',$user)->update(['enterprise_id'=>Auth::user()->notification]);
        $this->search=false;
    }
}
