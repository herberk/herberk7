<?php

namespace App\Http\Requests\Capital;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use App\Models\empresas\Capital;

class CreateCapitalRequest extends FormRequest
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
            'activo' => 'required|numeric|min:1|max:9999999999999',
            //Validar que no hay repètidos en empresa y mismo año
            'into21'    => 'numeric',
            'into1'     => 'numeric',
            'into2'     => 'numeric',
            'into3'     => 'numeric',
            'into4'     => 'numeric',
            'into5'     => 'numeric',
            'into6'     => 'numeric',
            'into7'     => 'numeric',
            'into8'     => 'numeric',
            'into9'     => 'numeric',
            'into22'    => 'numeric',
            'complementa1'=> 'numeric',
            'complementa2'=> 'numeric',
            'complementa3'=> 'numeric',
            'valfinanciero31' => 'numeric',
            'valfinanciero1' => 'numeric',
            'valfinanciero2' => 'numeric',
            'valfinanciero3' => 'numeric',
            'valfinanciero4' => 'numeric',
            'valfinanciero5' => 'numeric',
            'valfinanciero6' => 'numeric',
            'valfinanciero7' => 'numeric',
            'valfinanciero8' => 'numeric',
            'valfinanciero9' => 'numeric',
            'valtributario32' => 'numeric',
            'valtributario1' => 'numeric',
            'valtributario2' => 'numeric',
            'valtributario3' => 'numeric',
            'valtributario4' => 'numeric',
            'valtributario5' =>'numeric',
            'valtributario6' => 'numeric',
            'valtributario7' => 'numeric',
            'valtributario8' => 'numeric',
            'pasivo51'      =>  'numeric',
            'pasivoexigi1'  => 'numeric',
            'pasivoexigi2'  => 'numeric',
            'pasivoexigi3'  => 'numeric',
            'pasivoexigi4'  => 'numeric',
            'pasivoexigi5'  =>'numeric',
            'pasivoexigi6'  => 'numeric',
            'pasivoexigi7'  => 'numeric',
            'pasivoexigi8'  => 'numeric',
            'pasivoexigi9'  => 'numeric',
            'pasivoexigi10'  => 'numeric',
            'pasivoexigi11'  => 'numeric',
            'pasivoexigi12'  => 'numeric',
            'pasivoexigi13'  => 'numeric',
            'capitaltri'     => 'numeric',
            'ano'  => 'required|numeric',
            'id_empresa' => 'required|numeric|min:1',
        ];
    }
    public function messages()
    {
        return [
            'activo.required' => 'El campo Activo es obligatorio',
            'activo.numeric'  => 'El campo Activo es numerico',
//          'activo.min:1'  => 'El campo Activo debe ser mayor a 1',
            'activo.max:9999999999999'  => 'El campo Activo no puede ser mayor',
            'ano.required' => 'El año es obligatorio',
            'ano.numeric' => 'El campo año es numerico',
//          'id_empresa.min:1' => 'Seleccione una empresa',
            'id_empresa.required' => 'El id empresa es requerido',
            'id_empresa.numeric'  => 'El id empresa es numerico',
        ];
    }

}
