<?php

namespace App\Http\Livewire\Enterprise;

use Livewire\Component;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Carbon\Carbon;
use App\Models\Document;
use App\Models\Enterprise;
use Livewire\WithFileUploads;
class RegisterEnterprise extends Component
{
    use WithPagination;
    use WithFileUploads;
    
    protected $paginationTheme='bootstrap';
    public $level=[];
    public $hola;
    public $search; 
    public $open=true;
    public $selected;
    public $short_name,$project,$phone,$email,$long_name,$address,$adviser_id,$type,$logo;
    public $rules=[         'short_name'=>['required','max:40','unique:enterprises,short_name'],
    'long_name' => ['required','unique:enterprises,long_name'],
    'address'=>'required|max:40',
    'phone'=>'required|max:40',
    'email'=>['required', 'string', 'email', 'max:255','email:rfc,filter,dns','unique:enterprises,email'],
    'type'=>'required|max:40',
    'logo'=>'required|mimes:png,jpg,jpeg,gif,bmp,webp',      
    'level'=>'required|min:3|max:5'];
    public function updatingSearch(){
        $this->resetPage();
      }
      public function updatingLevel(){
        $this->resetPage();
      }
public function mount(){
  $this->level[]=Auth::user()->id;
}
    public function render()
    {
      
    
      $this->project = Project::latest()->first();
      //  dump(Auth::user()->group);
      if($this->project){$this->selected= Project::latest()->first()->id;}
      $project = Project::latest()->first();
      if($project){$this->selected= Project::latest()->first()->id;}
       $adviser = User::role('Consultor')->where('group',Auth::user()->group)->get(); 

       $adviser= $adviser->pluck('name','id');
       $this->adviser_id = User::role('Consultor')->where('group',Auth::user()->group)->first()->id; 
     
       $users=User::whereIn('id',$this->level)->paginate();
       $students=User::where('name','LIKE','%'. $this->search .'%')
       ->where([['name','LIKE','%'. $this->search .'%'],['enterprise_id', NULL],['group', Auth::user()->group ]])
       ->orWhere([['email','LIKE','%'. $this->search .'%'],['enterprise_id', NULL],['group', Auth::user()->group ]])
       ->whereNotIn('id',[Auth::user()->id ])->role('Estudiante')->paginate();
       return view('livewire.enterprise.register-enterprise',compact('project','adviser','students','users'));        
    }
    public function levelClicked()
    {
      // $n= count($this->level);
      //   if($n<2){
      //     $this->level[]=Auth::user()->id;
      //   }
        
    
    }
    public function store(){
      //dd($this->level);
      $this->validate();
      $project=Project::where('projects.name','=',$this->project->name)->first();
      $currentlyDate = Carbon::now()->addSeconds(30)->format('Y-m-d H:i:s');
      //dd($currentlyDate, $project->datetime);
      if($currentlyDate>$project->datetime){
         return redirect()->route('empresa.create')->with('info','La Fecha de postulacion ya paso');
      }
        
      $user=Auth::user()->roles->where('name','Estudiante');
      if($user->count()){
        $enterprise=Enterprise::create([
          'short_name'=> $this->short_name,
          'long_name'=> $this->long_name,
          'address'=>$this->address,
          'phone'=>$this->phone,
          'email'=>$this->email,
          'type'=>$this->type,  
        ]);
        
        if($this->level){
          foreach($this->level as $student){
            
             // User::where('id',$student)->update(['notification' => $enterprise->id]);
              User::where('id',$student)->update(['enterprise_id' => $enterprise->id]);              
          }
          //User::where('id',Auth::user()->id)->update(['enterprise_id' => $enterprise->id]);
        }
        
        $document=new Document(); 
         if($this->logo){
           //$document2=$request->file('logo');
          // $nameDocument=$document2->getClientOriginalName();
           $document->name = $this->logo->getClientOriginalName();
           $this->logo->storeAs('pagos',$document->name ,'ftp');
          //$document2=$request->file('logo')->storeAs('logos',$document2->getClientOriginalName(),'public');
          //Storage::disk('ftp')->put('logos'.'/'.$nameDocument, fopen($request->file('logo'), 'r+'));
           $enterprise->projectEnterprises1()->create([
           'users_id'=>$this->adviser_id,
           'project_id'=>$this->project->id,
           'status'=>'Postulante'    
         ]
         );
    
          $document->imageable_id= $enterprise->id;
          $document->imageable_type= Enterprise::class;
          $document->save();
      
         }
    
         return redirect()->route('user.enterpriseproject.show',$enterprise->projectEnterprises1->first()->id);
        
      }
      
      
        //$nuevo->projectEnterprises1()->attach($request->id_project); 
        return "no se registro";

    }
    public function close(){
      $this->emit('hideRegister');
    }
    public function verifyDate(){
      if(!$this->selected){
        $projectR = Project::all()->first();
        $this->selected=$projectR->id;
      }
      $project=Project::find($this->selected);
      $currentlyDate = Carbon::now()->format('Y-m-d H:i:s');  
      //dd($currentlyDate,$project->datetime);
      // dd($project->datetime);
      if($currentlyDate>$project->datetime){
         $this->emit('noPermit');
      }
   
  }

}
