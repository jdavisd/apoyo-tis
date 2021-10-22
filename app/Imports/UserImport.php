<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UserImport implements ToModel,WithHeadingRow,WithValidation
{
    public $roles;
        
    public function __construct($roles)
    {
      $this->roles = $roles; 
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
        $user->roles()->sync($this->roles);
        return $user;
    }
    public function rules(): array
    {
        return [
            'name' => ['required','string',],
            'email' => ['required','string',],
        ];
    }
}
