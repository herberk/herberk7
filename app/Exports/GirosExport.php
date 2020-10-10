<?php
namespace App\Exports;

use App\modal\Tablas\giros;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class GirosExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {

        $giros = giros::orderBy('name','ASC')
            ->select('id','codigo','name','afecto','cat_tribut','created_at')
            ->get();
       return  $giros;
    }

    public function headings(): array
    {
        return [
            '#',
            'Codigo',
            'Nombre',
            'Afecto',
            'Categoria',
            'Creado',

        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:I1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);

                $styleArray = [
                    'font' => [
                        'bold' => true,
                    ],
                    /*'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => 'FFFF0000'],
                        ],
                    ],*/
                ];

              //  $worksheet->getStyle('B2:G8')->applyFromArray($styleArray);

            },
        ];
    }

}

