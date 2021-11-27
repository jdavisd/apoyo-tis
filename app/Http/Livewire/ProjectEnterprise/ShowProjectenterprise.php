<?php

namespace App\Http\Livewire\ProjectEnterprise;

use App\Models\Document;
use App\Models\Payment;
use Livewire\Component;
use App\Models\ProjectEnterprise;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ShowProjectenterprise extends Component
{
    public $project;
    public $sort='date';
    public $order='desc'; 
    public $payment;
    public $documents;
    public $enterprise;
    public $socios;
    public $logo;
    protected $listeners=['accept','render','delete','reject'];
    public $idP;

    public function mount($id)
    {
        
        $this->idP=$id;
    }
    public function render()
    {
        //$this->project=ProjectEnterprise::find(1);
        $this->reset=['documents'];
        $this->project = ProjectEnterprise::find( $this->idP);
        $this->enterprise = $this->project->enterprise()->first();
        $this->payment=$this->project->payment()->get();
        $this->socios=User::Where('enterprise_id','=',$this->idP)->get();
        $this->logo= Document::OfType('App\Models\Enterprise')->where('imageable_id','=',$this->enterprise->id)->first();;
        $this->documents= Document::OfType('App\Models\Payment')
        ->join('payments','payments.id',"=",'documents.imageable_id')
        ->join('project_enterprises','payments.project_enterprise_id','=','project_enterprises.id')
        
        ->where('payments.project_enterprise_id','=',$this->project->id)
        ->select('documents.document_id','payments.date','payments.details','documents.name','payments.id','payments.status','payments.created_at')
        ->orderBy($this->sort,$this->order)
        ->get();
    
        return view('livewire.project-enterprise.show-projectenterprise');
    }

    public function delete($id){
        $document = Document::where('document_id', "=" , $id)->first();
        $payment = Payment::find($document->imageable_id);
        //Storage::disk('ftp')->delete('anuncios/'.$document->name); 
        unlink(storage_path('app/public/pagos/'.$document->name));
        DB::table('documents')->where('document_id', "=" , $document->document_id)->delete();
        $payment->delete();
        $this->render();
        //return redirect()->route('anuncio.index')->with('infoDelete','Se elimino el anuncio');
    }


    public function accept($id){
        
        $payment = Payment::find($id);
        $payment->status = 'Aceptado';
        $payment->save();
        $this->render();   
    }

    public function reject($id){
        $payment = Payment::find($id);
        $payment->status = 'Rechazado';
        $payment->save();
        $this->render();
    }
}
