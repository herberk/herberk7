<?php

namespace App\Http\Requests\Estadisticas;

use App\Models\estadisticas\recuento;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CreateEstadisticaRequest extends FormRequest
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
            'mes'     =>   'required',
            'venta'   =>  'required|numeric|min:0|max:999999999',
            'otroing' =>  'required|numeric|min:0|max:999999999',
            'compra'  =>  'required|numeric|min:0|max:999999999',
            'remun'   =>  'required|numeric|min:0|max:999999999',
            'honora'  =>  'required|numeric|min:0|max:999999999',
            'arriendo'=>  'required|numeric|min:0|max:999999999',
            'otrogas' =>  'required|numeric|min:0|max:999999999',
            'utmes'   =>  'required|numeric|min:45000|max:999999',
        ];
    }

    public function messages()
    {
        return [
            'mes.required' => 'El campo mes es requerido.',
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
            'utmes.required'  => 'La UTM es requerido. Verifique que el valor este capturado en la Tabla',
            'utmes.numeric'   => 'La UTM es numerico',
            'utmes.min:45000' => 'La UTM debe ser a lo menos $ 45.000.-',
            'utmes.max:999999'=> 'La UTM debe tener max seis digitod',
        ];
    }

    public function createEstadistica()
    {
        DB::transaction(function () {
            $recuentos = recuento::create([
                'ventaRCV' => $this->venta,
                'otroing' => $this->otroing,
                'compraRCV' => $this->compra,
                'remuneraciones' => $this->remun,
                'honorarios' => $this->honora,
                'arriendos' => $this->arriendo,
                'otrogas' => $this->otrogas,
                'saldo'    => $this->saldo,
                'ano' => setting( 'ano'),
                'utmes' => $this->utmes,
                'meses_id' => $this->mes,
                'empresas_id'=>setting('id_empresa')
            ]);
            $recuentos->save();
         });
    }

}
