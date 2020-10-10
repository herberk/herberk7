<?php

namespace App\Http\Requests\Estadisticas;

use App\Models\estadisticas\recuento;
use Illuminate\Foundation\Http\FormRequest;

class EditEstadisticaRequest extends FormRequest
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

           'venta'  =>  'required|numeric|min:0|max:999999999',
           'otroing' =>  'required|numeric|min:0|max:999999999',
           'compra'  =>  'required|numeric|min:0|max:999999999',
           'remun'   =>  'required|numeric|min:0|max:999999999',
           'honora'  =>  'required|numeric|min:0|max:999999999',
           'arriendo'=>  'required|numeric|min:0|max:999999999',
           'otrogas' =>  'required|numeric|min:0|max:999999999',
//           'utmes'   =>  'required|numeric|min:0|max:999999',
       ];
//Ver la necesicdad de validar utm
    }
    public function messages()
    {
        return [

            'venta.required'  => 'El campo Ventas es requerido.',
            'venta.numeric'   => 'El campo Ventas es numerico',
            'venta.min:0'     => 'El campo Ventas ser a lo menos 1',
            'venta.max:999999999'=> 'El campo Ventas debe tener max nueve digitod',
            'otroing.required'  => 'El campo Otros ingresos es requerido.',
            'otroing.numeric'   => 'El campo Otros ingresos es numerico',
            'otroing.min:0'     => 'El campo Otros ingresos ser a lo menos 1',
            'otroing.max:999999999'=> 'El campo Otros ingresos debe tener max nueve digitod',
            'compra.required'  => 'El campo Compras es requerido.',
            'compra.numeric'   => 'El campo Compras es numerico',
            'compra.min:0'     => 'El campo Compras ser a lo menos 1',
            'compra.max:999999999'=> 'El campo Compras debe tener max nueve digito',
            'remun.required'  => 'El campo Remuneracion es requerido.',
            'remun.numeric'   => 'El campo Remuneracion es numerico',
            'remun.min:0'     => 'El campo Remuneracion ser a lo menos 1',
            'remun.max:999999999'=> 'El campo Remuneracion debe tener max nueve digito',
            'honora.required'  => 'El campo Honorarios es requerido.',
            'honora.numeric'   => 'El campo Honorarios es numerico',
            'honora.min:0'     => 'El campo Honorarios ser a lo menos 1',
            'honora.max:999999999'=> 'El campo Honorarios debe tener max nueve digito',
            'arriendo.required'  => 'El campo Arriendos es requerido.',
            'arriendo.numeric'   => 'El campo Arriendos es numerico',
            'arriendo.min:0'     => 'El campo Arriendos ser a lo menos 1',
            'arriendo.max:999999999'=> 'El campo Arriendos debe tener max nueve digito',
            'otrogas.required'  => 'El campo Otros Gastos es requerido.',
            'otrogas.numeric'   => 'El campo Otros Gastos es numerico',
            'otrogas.min:0'     => 'El campo Otros Gastos ser a lo menos 1',
            'otrogas.max:999999999'=> 'El campo Otros Gastos debe tener max nueve digito',

        ];
    }
    public function updateUser( $rec)
    {
        $regis = recuento::findOrFail($rec);
        $regis->ventaRCV = $this->venta;
        $regis->otroing= $this->otroing;
        $regis->compraRCV= $this->compra;
        $regis->remuneraciones= $this->remun;
        $regis->honorarios= $this->honora;
        $regis->arriendos = $this->arriendo;
        $regis->otrogas= $this->otrogas;
        $regis->saldo  = $this->saldo;
        $regis->ano = setting( 'ano');
        $regis->utmes = $this->utmes;
        $regis->meses_id = $this->mes;
        $regis->empresas_id = setting('id_empresa');
        $regis->save();

    }
}
