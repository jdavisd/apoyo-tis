<?php

namespace App\Http\Controllers;

use App\Models\Postulate;
use Illuminate\Http\Request;

class PostulateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return "hola";
        return view('postular.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('postular.create');
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
        $request=Postulate::create($request->all());
        //$request=Postulate::create($request->all());
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postulate  $postulate
     * @return \Illuminate\Http\Response
     */
    public function show(Postulate $postulate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postulate  $postulate
     * @return \Illuminate\Http\Response
     */
    public function edit(Postulate $postulate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postulate  $postulate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postulate $postulate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postulate  $postulate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postulate $postulate)
    {
        //
    }
}
