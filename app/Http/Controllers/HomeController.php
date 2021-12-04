<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Models\Document;

class HomeController extends Controller
{
    public $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // return view('home');
       $documents = Document::OfType('App\Models\Announcement')->join('announcements', 'announcements.id', '=', 'imageable_id')->get();
       //return $documents;
      // return "cerdo";
       return view('announcements.index',compact('documents'));
    }
}
