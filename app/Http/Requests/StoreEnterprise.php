<?php

namespace App\Http\Requests;

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
            'short_name'=>'required|max:40',
            'long_name' => 'required',
            'address'=>'required|max:40',
            'phone'=>'required|max:40',
            'email'=>'required|max:40',
            'type'=>'required|max:40',
            'logo'=>'required|max:40',
            'email'=>'required|max:40',
            'adviser_id'=>'required',
            'project_id'=>'required'
        ];
    }
}
