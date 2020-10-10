<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class SociosEditRequest extends FormRequest
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
            'rut'       =>  'required',
            'name'      =>  'required|min:3 ',
            'email'     =>   'required|email',
            'apopago'   =>   'numeric|min:0|max:9999999999',
            'apopend'   =>   'numeric|min:0|max:9999999999',
            'porcen'    =>   'numeric|min:0|max:100,99',


        ];
//        return [
//            'rut'       => array('required',
//             Rule::unique('socios')->ignore($this->id)),
//            'name'      => 'required|min:3 ',
//            'email'     =>   'required|email',
//            'apopago'   =>   'min:0|max:9999999999',
//            'apopend'   =>   'min:0|max:9999999999',
//            'porcen'    =>   'min:0|max:100,99',
//       ];
    }
    public function messages()
    {
        return [
            'rut.required'             => 'El RUT es requerido',
            'rut.unique'               => 'El RUT debe ser unico en la tabla',
            'name.required'            => 'El nombre de la Empresa es requerido',
            'name.min'                 => 'El nombre de la Empresa debe ser mas largo',
            'email.required'           => 'El correo es requerido',
            'email.unique'             => 'El correo es unico',
            'email.email'              => 'El formsato no es correcto',
            'apopago.numeric'          => 'El Aporte es  Numerico',
            'apopago.min'              => 'El Aporte debe ser mayor',
            'apopago.max'              => 'El Aporte debe ser menor',
            'apopend.numeric'          => 'El Aporte es  Numerico',
            'apopend.min'              => 'El Aporte debe ser mayor',
            'apopend.max'              => 'El Aporte debe ser menor',
            'porcen.numeric'           => 'El %  es  Numerico',
            'porcen.min'               => 'El % debe ser mayor',
            'porcen.max'               => 'El % debe ser menor',
        ];
    }
}
