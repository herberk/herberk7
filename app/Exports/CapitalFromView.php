<?php

namespace App\Exports;

use App\models\empresas\capital;
use App\models\empresas\valcapital;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;

class CapitalFromView implements FromView, ShouldAutoSize
{


    private $year;

    public function __construct()
    {
        $this->year = Carbon::now()->year;
    }

    public function forYear(int $year = null)
    {
        $this->year = $year;
        return $this;
    }


    public function view(): View
    {
        return view('capital.exports.showpdf', [
            'date' => date('d-m-Y'),
            'ano' => $this->year,
            'capital' => capital::where('empresas_id',(setting('id_empresa')))
                 ->where('ano', $this->year)
                 ->first(),
              'valcapital' => valcapital::where('empresas_id',(setting('id_empresa')))
               ->where('ano', $this->year-1)
               ->first(),
            ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:Ww1';   // All headers
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
