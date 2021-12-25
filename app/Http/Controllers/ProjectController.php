<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
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
       
       return view ('projects.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required', 'max:40', 'min:6','unique:projects,name'],
            'period'=>['required'],
            'code'=>['required'],
            'datetime'=>['required','after:2 hours']
          ]);
        $request=Project::create($request->all());
        return redirect()->route('proyecto.index')->with('infoCreate','Se creo el proyecto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $project=Project::find($id);
       // $datetime=Carbon::createFromFormat('m/d/Y H:i:s', $project->datetime);
       // $data['transaction_date'] =  $data = $request->all();
       // $data['transaction_date'] = Carbon::createFromFormat('m/d/Y', $request->transaction_date)->format('Y-m-d');
        return view ('projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $project=Project::find($id);
        $request->validate([
        'name'=>['required', 'max:40', 'min:6',Rule::unique('projects')->ignore($project)],
        'period'=>['required'],
        'code'=>['required'],
        'datetime'=>['required','before: 4 months','after: tomorrow']
        ]);

        $project->name=$request->name;
        $project->period=$request->period;
        $project->code=$request->code;
        $project->datetime=$request->datetime;
        $project->save();
        return redirect()->route('proyecto.index')->with('infoUpdate','Se actualizo el proyecto');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}