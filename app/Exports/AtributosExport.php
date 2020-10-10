<?php

namespace App\Exports;

use App\Models\Tablas\atributo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;

class AtributosExport implements
    FromCollection,
    WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
     return atributo::all();
//        return atributo::with('Tipos');

    }
    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            '#',
            'Nombre Atributo',
            '--',
            'Tipo',
            'Created At',
            'Updated At',
        ];
    }

    public function registerEvents(): array
    {
        $datos = [
            AfterSheet::class => function (AfterSheet $event) {
                $event->getSheet()->autoSize();
                $event->getSheet()->getDelegate()->getStyle('A1:G763')  // All headers
                ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            },
            BeforeExport::class => function (BeforeExport $event) {
                $event->getWriter()
                    ->getDelegate()
                    ->getProperties()
                    ->setCreator("Hermann Berkhoff")
                    ->setLastModifiedBy("Hermann Berkhoff")
                    ->setTitle("Office 365 XLSX User Report")
                    ->setSubject("Office 365 XLSX User Report")
                    ->setDescription("Un comentario Huevon." );
            }
        ];

        return $datos;

        //  $worksheet->getStyle('B2:G8')->applyFromArray($styleArray);
    }

}
