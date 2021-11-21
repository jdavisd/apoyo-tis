<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
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
    
}
