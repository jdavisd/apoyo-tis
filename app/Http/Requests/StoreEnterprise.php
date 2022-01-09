<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreEnterprise extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'short_name'=>['required','regex:/^[a-zA-Z]+$/u','max:20','unique:enterprises,short_name'],
            'long_name' => ['required','regex:/^[a-zA-Z, ]+$/u','max:60','unique:enterprises,long_name'],
            'address'=>'required|max:60',
            //'phone'=>'required|max:8',
            'phone' => ['required','regex:/^[4,6,7][0-9]+$/','min:7','max:8'],
            'email'=>['required', 'string', 'email', 'max:255','email:rfc,filter,dns','unique:enterprises,email'],
            'type'=>'required|max:10|regex:/^[A-Z]+$/',
            'logo'=>'required|mimes:png,jpg,jpeg,gif,bmp,webp',      
            'adviser_id'=>'required',
            'project'=>'required',
            'students'=>'required|min:2|max:4',
        ];
    }

}
