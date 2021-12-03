<?php

namespace App\Http\Controllers;

use App\Models\Adviser;
use App\Models\Announcement;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class AnnouncementController extends Controller
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
        $documents = Document::OfType('App\Models\Announcement')
        ->join('announcements','announcements.id',"=",'documents.imageable_id')->get();
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
        $request->validate([
            'title'=>['required', 'max:40', 'min:6'],
            'code'=>['required'],
            'period'=>['required'],
            'description'=>['required'],
            'document'=>['required','mimes:pdf']
          ]);

        $announcement= new Announcement();
        $announcement->title = $request->title;
        $announcement->code= $request->code;
        $announcement->period = $request->period;
        $announcement->description = $request->description;  
        $announcement->adviser_id=1;
        $document=new Document();

        if($request->hasFile('document')){
            $document2=$request->file('document');

            $nameDocument=$document2->getClientOriginalName();

            $document->name = $document2->getClientOriginalName();
            $document2=$request->file('document')->storeAs('Anuncios',$document2->getClientOriginalName(),'public');
            //Storage::disk('ftp')->put('anuncios'.'/'.$nameDocument, fopen($request->file('document'), 'w+'));
            $announcement->save();
            $document->imageable_id= $announcement->id;
            $document->imageable_type= Announcement::class;
            $document->save();
        }else{
            $announcement->save();
        }
        return redirect()->route('anuncio.index')->with('info','Se creo el anuncio');

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
    public function edit($document)
    {
        $doc = Document::where('document_id', "=" , $document)->first();
        $announcement = Announcement::find($doc->imageable_id);
        return view('announcements.edit',compact('doc'),compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$document)
    {
        $request->validate([
            'title'=>['required', 'max:30', 'min:6'],
            'code'=>['required'],
            'period'=>['required'],
            'description'=>['required'],
            'document'=>['mimes:pdf']
        ]);

        $document = Document::where('document_id', "=" , $document)->first();
        $announcement = Announcement::find($document->imageable_id);
        
        $announcement->title = $request->title;
        $announcement->code = $request->code;
        $announcement->period = $request->period;
        $announcement->description = $request->description;
        if($request->hasFile('document')){
            //Storage::disk('ftp')->delete('anuncios/'.$document->name); 
            unlink(storage_path('app/public/anuncios/'.$document->name));
            $document2=$request->file('document');
            $var = DB::table('documents')
              ->where('document_id', $document->document_id)
              ->update(['name' => $document2->getClientOriginalName()]);
            $document2=$request->file('document')->storeAs('anuncios',$document2->getClientOriginalName(),'public');
            //$nameDocument=$document2->getClientOriginalName();
            //Storage::disk('ftp')->put('anuncios'.'/'.$nameDocument, fopen($request->file('document'), 'r+'));
        }
        $announcement->save();
        return redirect()->route('anuncio.index')->with('infoUpdate','Se actualizo el anuncio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy($document)
    {
        $document = Document::where('document_id', "=" , $document)->first();
        $announcement = Announcement::find($document->imageable_id);
        Storage::disk('ftp')->delete('anuncios/'.$document->name); 
        //unlink(storage_path('app/public/anuncios/'.$document->name));
        DB::table('documents')->where('document_id', "=" , $document->document_id)->delete();
        $announcement->delete();
        return redirect()->route('anuncio.index')->with('infoDelete','Se elimino el anuncio');
    }
}
