<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEnterprise;
use App\Models\Adviser;
use App\Models\Document;
use App\Models\Enterprise;

use App\Models\Project;
use App\Models\ProjectEnterprise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;




class EnterpriseController extends Controller
{
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
       $students = User::role('Estudiante')->get();
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
      
      $user=Auth::user()->roles->where('name','Estudiante');
      if($user->count()){
        $enterprise=Enterprise::create([
          'short_name'=>$request->short_name,
          'long_name'=>$request->long_name,
          'address'=>$request->address,
          'phone'=>$request->phone,
          'email'=>$request->email,
          'type'=>$request->type,  
          'period'=>$request->period,  
        ]);
        
        if($request->students){
          foreach($request->students as $student){
            if($student==Auth::user()->id){
              User::where('id',Auth::user()->id)->update(['enterprise_id' => $enterprise->id]);
            }
            else{
              User::where('id',$student)->update(['notification' => $enterprise->id]);
            }     
          }
        }
        
        $document=new Document(); 
         if($request->hasFile('logo')){
           $document2=$request->file('logo');
           $document->name = $document2->getClientOriginalName();
           $document2=$request->file('logo')->storeAs('logos',$document2->getClientOriginalName(),'public');
           $enterprise->projectEnterprises1()->create([
           'users_id'=>$request->adviser_id,
           'project_id'=>$request->project_id    
         ]
         );
      
          $document->imageable_id= $enterprise->id;
          $document->imageable_type= ProjectController::class;
          $document->save();
      
         }
         return $enterprise;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enterprise $enterprise)
    {
        //
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