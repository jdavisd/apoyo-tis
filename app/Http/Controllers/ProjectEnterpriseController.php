<?php

namespace App\Http\Controllers;

use App\Models\ProjectEnterprise;
use Illuminate\Http\Request;

class ProjectEnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('ProjectEnterprise.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectEnterprise  $projectEnterprise
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
         //$project=ProjectEnterprise::find($projectEnterprise);
         return view('ProjectEnterprise.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectEnterprise  $projectEnterprise
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projectEnterprise=ProjectEnterprise::find($id);
        return view('project-enterprise.edit',compact('projectEnterprise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectEnterprise  $projectEnterprise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectEnterprise $projectEnterprise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectEnterprise  $projectEnterprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectEnterprise $projectEnterprise)
    {
        //
    }
}
