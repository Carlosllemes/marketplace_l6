<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|max:21|min:3',
            'description' => 'required',
            'phone' => 'required',
            'mobile_phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' =>  'Campo obrigatorio',
            'max' => 'Maximo de 21 caracteres',
            'min' => 'Minimo de 3 caracteres',
        ];
    }


}
