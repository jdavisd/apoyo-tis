<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class observacionPropuesta extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $path;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details , $path)
    {
        $this->details = $details;
        $this->path = $path;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->path){
            if(strpos($this->path,'contrato')){
                return $this->subject('Contrato de servicios')->view('emails.observaciones')
            // ->attach(storage_path('app/public/pagos/'.$this->path));
            ->attach(asset('storage/pagos').'/'.$this->path);
            }else{
            return $this->subject('Observacion de propuesta')->view('emails.observaciones')
            // ->attach(storage_path('app/public/pagos/'.$this->path));
            ->attach(asset('storage/pagos').'/'.$this->path);
            }
        }else{
            return $this->subject('Observacion de propuesta')->view('emails.observaciones');
        }
        

    }
}
