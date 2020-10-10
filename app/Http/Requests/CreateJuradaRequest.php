<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class CreateJuradaRequest extends FormRequest
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
            'arti_id' => [ 'unique:juradas',
                Rule::exists('atributos', 'id'),
            ],
            'fe_vence'    => 'required',
            'descripcion'    => 'required',
            'Instruccion' => 'required|mimes:pdf|max:2024',
            'Formulario'  => 'required|mimes:pdf|max:2024',

        ];
    }
    public function messages()
    {
        return [
            'arti_id.unique'               =>  'La declaracion ya existe en la tabla',
            'descripcion.required'         => 'El campo descripcion es necesario',
            'arti_id.exists'               => 'Debe seleccionar una declaracion jurada',
        ];
    }
}
