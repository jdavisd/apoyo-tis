<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnterprise;
use App\Models\Adviser;
use App\Models\Document;
use App\Models\Enterprise;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;



class EnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     // return view('enterprises.create');
       $project = Project::pluck('name','id');
       //return  $project;
       $adviser = User::find(2);
    
       return view('enterprises.create',compact('project','adviser'));
       
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnterprise $request)
    {

        $enterprise=Enterprise::create([
            'short_name'=>$request->short_name,
            'long_name'=>$request->long_name,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'type'=>$request->type,
            'logo'=>$request->logo          
        ]);
       // $project=Project::findById($request->id_project);
       if(!$request->hasFile('logo')){
        return "No tiene el archivo";
       }
       $document=new Document();
       $document2=$request->file('logo');
       $document->name = $document2->getClientOriginalName();
       $document2=$request->file('logo')->storeAs('logos',$document2->getClientOriginalName(),'public');
       //$announcement->save();
       $document->imageable_id= 1;
       $document->imageable_type= Announcement::class;
       $document->save();

        $enterprise->projectEnterprises1()->create([
            'adviser_id'=>1,
            'project_id'=>$request->project_id    
        ]
        );
  
        //$nuevo->projectEnterprises1()->attach($request->id_project); 
        return $request->all();
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