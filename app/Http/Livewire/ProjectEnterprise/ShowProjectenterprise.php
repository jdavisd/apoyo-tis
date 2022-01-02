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
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

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
        $cont = Storage::disk('ftp')->get('pagos/contract.txt');
        $this->contAsunto =mb_convert_encoding($cont,'UTF-8','ISO-8859-1');
        

    }
    public function render()
    {

        //$this->project=ProjectEnterprise::find(1);
        //$this->reset=['documents'];
        
        //$file= fopen('../storage/app/public/pagos/contract.txt',"r");
        //$cont = Storage::disk('ftp')->get('public/pagos/contract.txt');
        //$cont2 =mb_convert_encoding($cont,'UTF-8','ISO-8859-1');
        
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
        $this->contAsunto = $this->cast($this->contAsunto);
        return view('livewire.project-enterprise.show-projectenterprise');
    }

    public function cast($texto){
        $text = str_replace('long_name',$this->enterprise->long_name,$texto);
        $text = str_replace('type',$this->enterprise->type,$text);
        $text = str_replace('short_name',$this->enterprise->short_name,$text);
        $text = str_replace('project',$this->project->project()->first()->name,$text);
        $advisers =User::role('Consultor')->get()->pluck('name'); 
        $var='';
        foreach ($advisers as $key) {
            $var = 'Lic. '.$key.' ,'.$var;
        }
        $text = str_replace('advisers',$var,$text);
        $manager = User::Where('enterprise_id','=',$this->idP)->latest('name')->first()->name;
        $text = str_replace('manager',$manager,$text);
        setlocale(LC_ALL, "sv_SE.UTF-8");
        Carbon::setLocale(config('app.locale'));
        $text = str_replace('date',Carbon::now()->format('d m Y'),$text);
        // dump(Carbon::now()->format('d F Y'));

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
            //$this->observar->storeAs('pagos',$var,'public');
            $image = [
                'name' => 'observaciones'.'.'.$this->observar->getClientOriginalName(),
                'path' => $this->observar->getRealPath(),
            ];
            
            Storage::disk('ftp')->put('pagos/'.$image['name'], file_get_contents($image['path']));
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

          $this->validate([
              
              'contAsunto' =>'required',
         ]);
        
        // $users=Storage::disk('local')->get('public/pagos/contract.txt');
        $long_name=$this->contAsunto;
         //$long_name = base64_decode($long_name);
        //  dd($long_name);
        $var = 'contrato'.'.'.$this->enterprise->short_name.'.pdf';
        $var =  str_replace(' ','-',$var);
        $pdf = PDF::loadView('emails.contract',compact('long_name'));
        Storage::disk('ftp')->put('pagos/'.$var, $pdf->output());

        
        
        //$var = Str::slug($var,'-');
        $details=[
            'title'=>'Contratacion de servicios',
            'list'=>[''],

            'action'=>'PlataformaTIS',
            'link'=>'http://servisoft.tis.cs.umss.edu.bo/'
            ];
        $mc = new MailController;
        $mc->observar($this->enterprise->email,$details,$var);
        $this->project->status = 'Contratado';  
        $this->project->save();
        Storage::disk('ftp')->delete('pagos/'.$var);
        //unlink(storage_path('app/public/pagos/'.$var));
        $this->emit('hideContrato');
        $this->render();
    }

    public function setPago($id , $estado){
        // dd($id);
        $this->estado = $estado;
        $this->idPago = $id;
    }

}
