<?php

namespace App\Http\Livewire\ProjectEnterprise;

use App\Models\Document;
use App\Models\Enterprise;
use App\Models\Payment;
use Livewire\Component;
use App\Models\ProjectEnterprise;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MailController;
use Barryvdh\DomPDF\Facade as PDF;
// use PDF;

class ShowProjectenterprise extends Component
{
    use WithFileUploads;
    public $project;
    public $sort='created_at';
    public $order='desc';
    public $payment;
    public $documents;
    public $enterprise;
    public $socios;
    public $logo;
    protected $listeners=['accept','render','reject','delete'=>'delete'];
    public $idP;
    public $observar;
    public $asunto;
    public $idPago;
    public $estado = '';
    public $contAsunto;
    public $contAdjunto;
    // public $contract;


    public function mount($id)
    {
        $this->idP=$id;
        //$this->contAsunto=Storage::disk('local')->get('public/pagos/contract.txt') ;
        // dd(gettype($this->contAsunto));
        // $this->contAsunto='adwdasdwadawdawdwd'.$this->contAsunto;
        //dump($this->contAsunto);
        // $this->contAsunto = null;
        $cont = Storage::disk('local')->get('public/pagos/contract.txt');
        $this->contAsunto =mb_convert_encoding($cont,'UTF-8','ISO-8859-1');

    }
    public function render()
    {

        //$this->project=ProjectEnterprise::find(1);
        //$this->reset=['documents'];
        
        $file= fopen('../storage/app/public/pagos/contract.txt',"r");
        $cont = Storage::disk('local')->get('public/pagos/contract.txt');
        $cont2 =mb_convert_encoding($cont,'UTF-8','ISO-8859-1');
        // dd($cont2);

        $this->project = ProjectEnterprise::find( $this->idP);
        $this->enterprise = $this->project->enterprise()->first();
        $this->payment=$this->project->payment()->get();
        $this->socios=User::Where('enterprise_id','=',$this->idP)->get();
        $this->logo= Document::OfType('App\Models\Enterprise')->where('imageable_id','=',$this->enterprise->id)->first();
        $this->documents= Document::OfType('App\Models\Payment')
        ->join('payments','payments.id',"=",'documents.imageable_id')
        ->join('project_enterprises','payments.project_enterprise_id','=','project_enterprises.id')

        ->where('payments.project_enterprise_id','=',$this->project->id)
        ->select('documents.document_id','payments.created_at','payments.details','documents.name','payments.id','payments.status','payments.created_at')
        ->orderBy($this->sort,$this->order)
        ->get();

        return view('livewire.project-enterprise.show-projectenterprise',compact('cont2'));
    }

    public function cast($texto){
        $text='';
        for ($i=0; $i < strlen($texto); $i++) { 
            $text=$text.$texto[$i];
        }
        // dd($text);
        return $text;
    }

    public function delete($id){
        $document = Document::where('document_id', "=" , $id)->first();
        $payment = Payment::find($document->imageable_id);
        Storage::disk('ftp')->delete('pagos/'.$document->name);
         //unlink(storage_path('app/public/pagos/'.$document->name));
        DB::table('documents')->where('document_id', "=" , $document->document_id)->delete();
       $payment->delete();
       $this->render();
      //return redirect()->route('anuncio.index')->with('infoDelete','Se elimino el anuncio');
    }

    public function accept($id){
        $payment = Payment::find($id);
        $payment->status = 'Aceptado';
        $payment->save();
        // $this->estado = true;
        $this->render();
    }

    protected $rules=[
        'observar' => 'nullable|mimes:pdf',
        'asunto'=>'required',
    ];
    public function reject(){
        $this->validate();
        // dd($this->idPago);
        $payment = Payment::find($this->idPago);

        if(!$this->observar==null){
            // dd($this->observar);
            $var = 'observaciones'.'.'.$this->observar->getClientOriginalName();
           // $this->observar->storeAs('pagos',$var,'public');
            $image = [
                'name' => $this->observar->getClientOriginalName(),
                'path' => $this->observar->getRealPath(),
            ];
            
            Storage::disk('ftp')->put('pagos/'.$image['name'], file_get_contents($image['path']), 'r+');
            $details=[
                'title'=>'Correo de observacion de propuesta',
                'list'=>[$this->asunto],
                'action'=>'PlataformaTIS',
                'link'=>'http://servisoft.tis.cs.umss.edu.bo/'
                ];
            $mc = new MailController;
            $mc->observar($this->enterprise->email,$details,$var);
            //unlink(storage_path('app/public/pagos/'.$var));
            Storage::disk('ftp')->delete('pagos/'.$var);
            }else{
            $details=[
            'title'=>'Correo de observacion de propuesta',
            'list'=>[$this->asunto],

            'action'=>'PlataformaTIS',
            'link'=>'http://servisoft.tis.cs.umss.edu.bo/'
            ];
            $mc = new MailController;
            $mc->observar($this->enterprise->email,$details,null);
        }

        // dd($this->observar);
        // $this->estado = false;
        $payment->status = $this->estado;
        $payment->save();
        $this->emit('hideObservar');
        $this->render();
    }

    public function contrato(){

        //  $this->validate([
        //     // 'contAdjunto' => 'required|mimes:pdf',
        //      'contAsunto' =>'required',
        //  ]);
        
        // $users=Storage::disk('local')->get('public/pagos/contract.txt');
        $long_name=$this->contAsunto;
         //$long_name = base64_decode($long_name);
        //  dd($long_name);
        $pdf = PDF::loadView('emails.contract',compact('long_name'));
        Storage::put('public/pagos/pzasd.pdf', $pdf->output());
        //  dd($pdf->download('asdsad.pdf'));

        // $pdf->save('myfile.pdf');

        //Storage::put('app/public/pagos/contrato.pdf', $pdf);

        if(!$this->contAdjunto==null){
            $var = 'contrato'.'.'.$this->contAdjunto->getClientOriginalName();
            //$this->contAdjunto->storeAs('pagos',$var,'public');

            $this->contAdjunto->storeAs('pagos', $var, 'ftp');
            $details=[
                'title'=>'Contratacion de servicios',
                'list'=>[$this->contAsunto],

                'action'=>'PlataformaTIS',
                'link'=>'http://servisoft.tis.cs.umss.edu.bo/'
                ];
            $mc = new MailController;
            $mc->observar($this->enterprise->email,$details,$var);
            //unlink(storage_path('app/public/pagos/'.$var));
            Storage::disk('ftp')->delete('pagos/'.$var);
        }
        //$this->project->status = 'Contratado';
        //$this->project->save();
        //reset(['pdf']);
        $this->emit('hideContrato');
        $this->render();
    }

    public function setPago($id , $estado){
        // dd($id);
        $this->estado = $estado;
        $this->idPago = $id;
    }

}
