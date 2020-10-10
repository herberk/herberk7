<?php

namespace App\Exports\estadisticas;


use App\Models\estadisticas\recuento;
use Maatwebsite\Excel\Concerns\FromCollection;

class EstadisticasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        {
            $recuentos = recuento::where('empresas_id',(setting('id_empresa')))->orderBy('anomes','desc')
               ->with('empresas')
                ->with('meses')
                ->select('anomes', 'ventaRCV','otroing','compraRCV',
                    'remuneraciones','honorarios','arriendos','otrogas','saldo','utmes','meses_id','empresas_id'
                )->get();
            return  $recuentos;
        }
    }
}
