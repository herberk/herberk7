<?php

namespace App\Exports;

use App\models\empresas\socio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class SociosExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {

        $socios = socio::with('empresas')
          ->orderBy('name','ASC')
            ->select('id', 'rut', 'name', 'email','fono','rep_legal','porcen','apopago','apopend','aporte','notas','created_at')
            ->get();
//        dd($socios);
        return  $socios;
    }

    public function headings(): array
    {
        return [
            'id',
            'rut',
            'Nombre',
            'Email',
            'Telefonos',
            'Es Representante',
            'Porcentage',
            'Aporte Pagado',
            'Aporte Pendiente',
            'Total Aporte',
            'Notas u observaciones',
            'Creado',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1';   // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);

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