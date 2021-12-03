<?php

namespace App\Rules;
use App\Models\User;

use Illuminate\Contracts\Validation\Rule;

class CheckStudents implements Rule
{
    public $enterprise_id;
    public $n;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($enterprise_id)
    {
    $this->enterprise_id=$enterprise_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
       // dd($value);
       dd($this->enterprise_id);
         $count=count($value);
        $count2=User::where('enterprise_id',$this->enterprise_id)->get()->count();
        $a= $count+$count2;
      
        if(($a)< 6 && ($a)>2){
               return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
