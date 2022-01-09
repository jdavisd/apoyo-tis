<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEnterprise;
use App\Models\Adviser;
use App\Models\Document;
use App\Models\Enterprise;
use App\Models\Payment;
use App\Models\Project;
use App\Models\ProjectEnterprise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Rules\CheckStudents;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use DateTimeZone;

class EnterpriseController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');

  }  
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('enterprises.index');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
       $project = Project::pluck('name','id');
       $adviser = User::role('Consultor')->get();    
       $adviser= $adviser->pluck('name','id');
       $students = User::role('Estudiante')->whereNull('notification')->get();
       return view('enterprises.create',compact('project','adviser','students')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnterprise $request)
    {
      $project=Project::where('projects.name','=',$request->project)->first();
      $currentlyDate = Carbon::now()->addSeconds(30)->format('Y-m-d H:i:s');
      //dd($currentlyDate, $project->datetime);
      if($currentlyDate>$project->datetime){
         return redirect()->route('empresa.create')->with('info','La Fecha de postulacion ya paso');
      }
        
      $user=Auth::user()->roles->where('name','Estudiante');
      if($user->count()){
        $enterprise=Enterprise::create([
          'short_name'=>$request->short_name,
          'long_name'=>$request->long_name,
          'address'=>$request->address,
          'phone'=>$request->phone,
          'email'=>$request->email,
          'type'=>$request->type,  
        ]);
        
        if($request->students){
          foreach($request->students as $student){
            
             // User::where('id',$student)->update(['notification' => $enterprise->id]);
              User::where('id',$student)->update(['enterprise_id' => $enterprise->id]);              
          }
          User::where('id',Auth::user()->id)->update(['enterprise_id' => $enterprise->id]);
        }
        
        $document=new Document(); 
         if($request->hasFile('logo')){
           $document2=$request->file('logo');
           $nameDocument=$document2->getClientOriginalName();
           $document->name = $document2->getClientOriginalName();
          $document2=$request->file('logo')->storeAs('logos',$document2->getClientOriginalName(),'public');
          //Storage::disk('ftp')->put('logos'.'/'.$nameDocument, fopen($request->file('logo'), 'r+'));
           $enterprise->projectEnterprises1()->create([
           'users_id'=>$request->adviser_id,
           'project_id'=>$project->id,
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

    /**
     * Display the specified resource.
     *s
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function show(Enterprise $enterprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function edit(Enterprise $enterprise)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $enterprise_id)
    {
      
      $request->validate([
        'short_name'=>['required','regex:/^[a-zA-Z]+$/u','max:20'],
        'long_name' => ['required','regex:/^[a-zA-Z, ]+$/u','max:60'],
        'address'=>'required|max:60',
        'phone'=>['required','regex:/^[4,6,7][0-9]+$/','min:7','max:8'],
        'email'=>['required', 'string', 'email', 'max:255','email:rfc,filter,dns'],
        //'type'=>['required','max:10','regex:/^[A-Z]+$/'],
        'type'=>'required|max:10|regex:/^[A-Z]+$/',
        'logo'=>'mimes:png,jpg,jpeg,gif,bmp,webp',      
        'adviser_id'=>'required',
        'project_id'=>'required',
  
    ]);
    $project=Project::find($request->project_id);
    $currentlyDate = Carbon::now()->format('Y-m-d H:i:s');  
    if($currentlyDate>$project->datetime){
       return redirect()->back()->with('error','La Fecha de postulacion ya paso');
    }
    if($request->students){
      $count=count($request->students);
      $count2=User::where('enterprise_id',$enterprise_id)->get()->count();
      $a= $count+$count2;
    }
    else{
      $count2=User::where('enterprise_id',$enterprise_id)->get()->count();
      $a= $count2;
    }
   
  
    if(($a)< 6 && ($a)>2){
      $user=Auth::user()->roles->where('name','Estudiante');
      if($user->count()){
        $enterprise=Enterprise::find($enterprise_id);
        $enterprise->short_name=$request->short_name;
        $enterprise->long_name=$request->long_name;
        $enterprise->address=$request->address;
        $enterprise->phone=$request->phone;
        $enterprise->email=$request->email;
        $enterprise->type=$request->type;  
         $enterprise->save();
        
        if($request->students){
          foreach($request->students as $student){
            
             // User::where('id',$student)->update(['notification' => $enterprise->id]);
              User::where('id',$student)->update(['enterprise_id' => $enterprise->id]);              
          }
          User::where('id',Auth::user()->id)->update(['enterprise_id' => $enterprise->id]);
        }
        
        $document = Document::OfType('App\Models\Enterprise')->where('documents.imageable_id','=',$enterprise_id)->first();
        // $document = Document::where('document_id', "=" , $document)->first();
       // $announcement = Announcement::find($document->imageable_id);
        $project = ProjectEnterprise::where('enterprise_id','=',$enterprise_id)->first();
        $project->users_id = $request->adviser_id;
        $project->project_id=$request->project_id ;
        $project->save();

         if($request->hasFile('logo')){
           $document2=$request->file('logo');
           $nameDocument=$document2->getClientOriginalName();
           $document->name = $document2->getClientOriginalName();
           //$document2=$request->file('logo')->storeAs('logos',$document2->getClientOriginalName(),'public');
           Storage::disk('ftp')->put('logos'.'/'.$nameDocument, fopen($request->file('document'), 'r+'));
           

         
      
          $document->imageable_id= $enterprise->id;
          $document->imageable_type= Enterprise::class;
          $document->save();
      
         }
        
         return redirect()->route('user.enterpriseproject.show',$enterprise->projectEnterprises1->first()->id);   
    }     
    }
    else{
      return redirect()->route('user.enterpriseproject.edit',$enterprise_id)->with('info','los socios deben deben ser de 3 a 5'); 
    }
     // dd($request->students);
     
    
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enterprise $enterprise)
    {
        //
    }
}