<?php

namespace App\Http\Livewire\Announcement;

use App\Models\Announcement;
use Livewire\Component;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AnnouncementsIndex extends Component
{
    public $documents;
    protected $listeners=['delete'];

    public function render()
    {
        $this->documents = Document::OfType('App\Models\Announcement')
        ->join('announcements','announcements.id',"=",'documents.imageable_id')->get();
        return view('livewire.announcement.announcements-index');
    }
    public function delete($id){

        $document = Document::where('document_id', "=" , $id)->first();
        $announcement = Announcement::find($document->imageable_id);
        //Storage::disk('ftp')->delete('anuncios/'.$document->name); 
        unlink(storage_path('app/public/anuncios/'.$document->name));
        DB::table('documents')->where('document_id', "=" , $document->document_id)->delete();
        $announcement->delete();
        $this->render();
        //return redirect()->route('anuncio.index')->with('infoDelete','Se elimino el anuncio');
    }
}
