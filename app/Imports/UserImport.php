<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\Importable;
use App\Http\Controllers\MailController;
use App\Mail\SendMail;
use App\Models\User;
use App\Notifications\NewUser;
use Illuminate\Notifications\Messages\MailMessage;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;


class UserImport implements ToModel,WithHeadingRow,WithValidation,SkipsOnFailure,SkipsEmptyRows
{
    use Importable,SkipsFailures,SkipsErrors;
    public $roles;
    public $enviar;   
    public $send;

    public function __construct($roles,$send)
    {
      $this->roles = $roles;
      $this->enviar = new MailController;
      $this->send=$send;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user=  User::create([
            'name'=>$row['name'],
            'email'=>$row['email'],
            'password'=>Hash::make($row['email']),
        ]);      
        if($this->roles){
            $user->roles()->sync($this->roles);
        }
        if($this->send){
            $details=[
                'title'=>'Correo de creacion de cuenta',
                'list'=>['Usted ha sido registrado en la platadorma de TIS',
                         'Utilize su correo institucional como correo y como contraseña para ingresar a la plataforma',
                         'No olvide por seguridad realizar el cambio de su contraseña'],
                'action'=>'PlataformaTIS',
                'link'=>'http://servisoft.tis.cs.umss.edu.bo/'
            ];
            $this->enviar->sendMail($row['email'],$details);
           // $user->notify(new NewUser($user));
        }
        return $user;
    }
    public function rules(): array
    {
      
        return [
            'name' => ['required'],
            //'email' => ['unique:users,email','required','email:rfc,dns,filter']
            'email' => ['unique:users,email','required']
        ];
        
    }
}
