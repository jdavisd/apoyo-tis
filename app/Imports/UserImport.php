<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\Importable;
use App\Http\Controllers\MailController;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Notifications\Messages\MailMessage;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;


class UserImport implements ToModel,WithHeadingRow,WithValidation,SkipsOnFailure
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
        $partsEmail= explode("@", strval( $row['email']));
        //$partsName= explode(" ", strval( $row['name']));
        //substr(string,start,length)
        $partname=substr(strval( $row['name']),0,3);

        $user=  User::create([
            'name'=>$row['name'],
            'email'=>$row['email'],
            //'password'=>Hash::make($row['password']),
            //'password'=>Hash::make($codeSis),
            'password'=>Hash::make($partsEmail[0].$partname),
        ]);
        if($this->roles){
            $user->roles()->sync($this->roles);
        }

        if($this->send){
            $this->enviar->sendMail($row['email']);
        }
       // $this->enviar->sendMail($row['email']);
        return $user;
    }
    public function rules(): array
    {
      
        return [
       
            'name' => ['required'],
            'email' => ['required','unique:users,email'],
        ];
        
    }

/*public function customValidationAttributes()
{
    return ['email' => 'correo'];
}*/
}
