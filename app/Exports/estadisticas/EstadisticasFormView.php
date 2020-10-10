<?php

namespace App\Exports\estadisticas;

use App\Models\estadisticas\recuento;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;


class EstadisticasFormView implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('Exports.estadisticas.estadisticaexcel', [
           'date' => date('d-m-Y'),
           'recuentos' => recuento::where('empresas_id',(setting('id_empresa')))
            ->orderBy('ano')
            ->orderBy('meses_id')
            ->with('empresas')
            ->with('meses')
            ->select( 'ano','meses_id','ventaRCV','otroing','compraRCV',
                'remuneraciones','honorarios','arriendos','otrogas','saldo','utmes','empresas_id'
            )->get(),
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W2';   // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);

                $styleArray = [
                    'font' => [
                        'bold' => true,
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => 'FFFF0000'],
                        ],
                    ],
                ];
            },
        ];
    }

}
