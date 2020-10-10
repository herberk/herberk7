<?php

namespace App\Http\Requests;
use App\modal\empresas\empresa;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditEmpresasRequest extends FormRequest
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
            'name' => 'required|min:3 ',
            'name_corto' => 'required|min:3|max:10 ',
            'codpostal' => 'required',

//            'email' => 'required|unique:empresas,email,' . $this->route->getParameter('empresas'),
//            'name' => 'required|max:25',
//            Rule::unique('empresas')->ignore(),
//            'codigo' => 'max:5',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre de la Empresa es requerido',
            'name.min' => 'El nombre de la Empresa debe ser mas largo',
            'name_corto.required' => 'El nombre corto  es requerido',
            'name_corto.min:3|max:10' => 'El nombre corto debe ser entre 3 y 10 Carac.',
            'codpostal.required'      => 'El Zip es requerido',
        ];
    }
}
