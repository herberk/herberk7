<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateEmpresasRequest extends FormRequest
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
            'rut'        => 'required|unique:empresas',
            'name'       => 'required|min:3 ',
            'name_corto' => 'required|min:3|max:10|unique:empresas',
            'capital'    => 'numeric|min:0',
            'codpostal' => 'required|numeric|min:0000000|max:9999999',
            'email'     =>  'required|unique:empresas|email',
        ];
    }
    public function messages()
    {
        return [
            'rut.required'             => 'El RUT es requerido',
            'rut.unique'               => 'El RUT debe ser unico en la tabla',
            'name.required'            => 'El nombre de la Empresa es requerido',
            'name.min'                 => 'El nombre de la Empresa debe ser mas largo',
            'name_corto.required'      => 'El nombre corto  es requerido',
            'name_corto.unique'        => 'El nombre corto  es unico',
            'name_corto.min:3|max:10'  => 'El nombre corto debe ser entre 3 y 10 Carac.',
            'capital.numeric'          => 'El Capital es  Numerico',
            'capital.min'              => 'El Capital debe ser mayor 0',
            'codpostal.required'      => 'El Zip es requerido',
            'codpostal.numeric'       => 'El Zip es numerico',
            'codpostal.min'           => 'El Zip es de 7 digi',
            'codpostal.max'           => 'El Zip max:7 digitos',
            'email.required'           => 'El correo es requerido',
            'email.unique'             => 'El correo es unico',
            'email.email'              => 'El formsato no es correcto',
        ];
    }

}
