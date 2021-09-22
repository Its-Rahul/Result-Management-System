<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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

            'fullname' => 'required|regex:/^[a-zA-Z ]+$/',
            'email' => 'required',
            'roll_id' => 'required|Integer',
            'class_id' => 'required',
            'phone' => 'required|min:10|max:10|regex:/^(98)([0-9]{8})$/',
            'dob' => 'required|before:today|before:3 years|nullable',
            'address' => 'required|regex:/^[a-zA-Z ]+$/',
            'image' => 'mimes:png,jpg|max:2048',
            'status' => 'required',
        ];
    }
}
