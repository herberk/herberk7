<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfessionRequest extends FormRequest
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
            'title'   => 'required|max:50|unique:professions',
//            'g-recaptcha-response' => 'required|captcha',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'La profesion es requerida',
            'title.unique' => 'La profesion debe ser unica en la tabla',
            'title.max' =>    'La profesion  max:50 caracteres',
            'g-recaptcha-response.required' => 'La recapcha de tu.. es necesaria',
        ];
    }

}
