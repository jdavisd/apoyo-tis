<?php

namespace App\Http\Livewire\Enterprise;

use App\Models\Enterprise;
use App\Models\ProjectEnterprise;
use App\Models\User;
use Livewire\Component;


class ListEnterprise extends Component
{
    public $search;
    public function render()
    {
        $enterprises = ProjectEnterprise::join('users','project_enterprises.users_id',"=",'users.id')
        ->join('enterprises', 'project_enterprises.enterprise_id', '=', 'enterprises.id')
        ->select('enterprises.short_name','enterprises.long_name', 'enterprises.period','users.name')
        ->where('enterprises.short_name','LIKE','%'. $this->search .'%')
        ->orWhere('enterprises.long_name','LIKE','%'. $this->search .'%')->get();

        return view('livewire.enterprise.list-enterprise',compact('enterprises'));
    }
}
