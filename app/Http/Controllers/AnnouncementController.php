<?php

namespace App\Http\Controllers;

use App\Models\Adviser;
use App\Models\Announcement;
use App\Models\Document;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$documents = Document::all()->where('imageable_type', 'App\Models\Announcemens');
        $documents = Document::OfType('App\Models\Announcement')->join('announcements', 'announcements.id', '=', 'imageable_id')->get();
        //return $documents;
        return view('announcements.index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $document=new Document();
        $announcement= new Announcement();
        $announcement->title = $request->title;
        $announcement->code= $request->code;
        $announcement->period = $request->period;
        $announcement->description = $request->description;  
        $announcement->adviser_id=1;

        if($request->hasFile('document')){

            $document2=$request->file('document');
            $document->name = $document2->getClientOriginalName();
            $document2=$request->file('document')->storeAs('anuncios',$document2->getClientOriginalName(),'public');
            $announcement->save();
            $document->imageable_id= $announcement->id;
            $document->imageable_type= Announcement::class;
            $document->save();

        }else{
            $announcement->save();
        }
        
        return redirect()->route('anuncio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
