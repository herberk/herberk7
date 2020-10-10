<?php

namespace App\Http\Requests\Archivo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateFileRequest extends FormRequest
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
            'empre_id' => [
                'present',
                Rule::exists('empresas', 'id'),
            ],
            'dir_id' => [
                'nullable', 'present', 'required',
                Rule::exists('directorios', 'id'),
            ],
            'file' => 'required|mimes:xlsx,xls,pdf|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'file.required'          => 'La seleccion de un archivos es requerida',
            'file.mimes'             => 'El archivo debe tener extencion xls, xlsx o pdf ',
            'file.max'               => 'Excede el tamaño maximo del archivo 2048 Kb ',
            'empre_id.exists'        => 'Debe seleccionar una empresa',
            'dir_id.exists'          => 'Debe seleccionar una carpeta o directorio',

        ];
    }
}
