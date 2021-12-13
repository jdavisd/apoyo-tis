<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Mail\observacionPropuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class MailController extends Controller
{

    public function __construct()
    {
    }

    public function sendMail($email,$details){  
        
        Mail::to($email)->send(new SendMail($details));
  
    }

    public function observar($email,$details,$path){  
        
        Mail::to($email)->send(new observacionPropuesta($details, $path));
  
    }
    
}
