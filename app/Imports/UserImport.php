<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel,WithHeadingRow
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

        $user=  User::create([
            'name'=>$row['name'],
            'email'=>$row['email'],
            'password'=>Hash::make($row['password']),
        ]);
        $user->roles()->sync($this->roles);
        return $user;
    }
}
