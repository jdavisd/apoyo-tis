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
            'short_name'=>['required','max:40','unique:enterprises,short_name'],
            'long_name' => ['required','unique:enterprises,long_name'],
            'address'=>'required|max:40',
            'phone'=>'required|max:40',
            'email'=>['required', 'string', 'email', 'max:255','email:rfc,filter,dns','unique:enterprises,email'],
            'type'=>'required|max:40',
            'logo'=>'required|mimes:png,jpg,jpeg,gif,bmp,webp',      
            'adviser_id'=>'required',
            'project_id'=>'required',
            'students'=>'required|min:2|max:4',
        ];
    }

}
