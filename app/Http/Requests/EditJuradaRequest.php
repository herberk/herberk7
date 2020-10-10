<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditJuradaRequest extends FormRequest
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
            'arti_id' => [
                Rule::unique('juradas')->ignore($this->id),
                Rule::exists('atributos', 'id'),
            ],
            'fe_vence'    => 'required',
            'descripcion'    => 'required',
        ];
    }
    public function messages()
    {
        return [
            'arti_id.unique'          =>  'La declaracion ya existe en la tabla',
            'arti_id.exists'          => 'Debe seleccionar una declaracion jurada',
            'descripcion.required'    => 'El campo descripcion es necesario',

        ];
    }
}
