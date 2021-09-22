<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Sabberworm\CSS\Rule\Rule;

class ClassRequest extends FormRequest
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


            'classnamenumeric' => 'required|Integer|unique:table_classes|max:10',
            'classname' =>'required|unique:table_classes|max:255|regex:/^[a-zA-Z ]+$/',
        ];
    }
}
