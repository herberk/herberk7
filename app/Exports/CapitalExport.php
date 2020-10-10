<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Models\empresas\capital;

class CapitalExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $capitals = capital::where('empresas_id',(setting('id_empresa')))->orderBy('ano','desc')
            ->select( 'activo','ano','empresas_id','into21','into1','into2','into3','into4','into5','into6',
        'into7', 'into8','into9', 'into22', 'complementa1', 'complementa2', 'complementa3', 'valfinanciero31','valfinanciero1',
        'valfinanciero2','valfinanciero3','valfinanciero4','valfinanciero5','valfinanciero6','valfinanciero7','valfinanciero8',
        'valfinanciero9','valtributario32','valtributario1','valtributario2','valtributario3','valtributario4','valtributario5',
        'valtributario6','valtributario7','valtributario8','pasivo51','pasivoexigi1','pasivoexigi2','pasivoexigi3','pasivoexigi4',
        'pasivoexigi5','pasivoexigi6','pasivoexigi7','pasivoexigi8','pasivoexigi9','pasivoexigi10','pasivoexigi11','pasivoexigi12',
        'pasivoexigi13', 'capitaltri'
            ) ->get();
        return  $capitals;
    }
    public function headings(): array
    {
        return [
            'Activo','Año','Id','into21','into1','into2','into3','into4','into5','into6',
            'into7', 'into8','into9', 'into22', 'complementa1', 'complementa2', 'complementa3', 'valfinanciero31','valfinanciero1',
            'valfinanciero2','valfinanciero3','valfinanciero4','valfinanciero5','valfinanciero6','valfinanciero7','valfinanciero8',
            'valfinanciero9','valtributario32','valtributario1','valtributario2','valtributario3','valtributario4','valtributario5',
            'valtributario6','valtributario7','valtributario8','Total Pasivo','pasivoexigi1','pasivoexigi2','pasivoexigi3','pasivoexigi4',
            'pasivoexigi5','pasivoexigi6','pasivoexigi7','pasivoexigi8','pasivoexigi9','pasivoexigi10','pasivoexigi11','pasivoexigi12',
            'pasivoexigi13', 'Capital   Tributario'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:BA1';   // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);

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
