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
            'fullname' => 'required',
            'email' => 'required',
            'roll_id' => 'required',
            'class_id' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'image' => 'mimes:png,jpg|max:2048'
        ];
    }
}
