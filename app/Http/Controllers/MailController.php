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

    public function sendMail($email){

        $details=[
            'title'=>'Correo de creacion de cuenta',
            'body'=>'Est es un mensaje de prueba con exel'
        ];
        Mail::to($email)->send(new SendMail($details));
        return "correo enviado";
    }
}
