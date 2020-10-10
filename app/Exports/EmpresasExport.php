<?php
namespace App\Exports;

use App\models\empresas\empresa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class EmpresasExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {

        $empresas = empresa::orderBy('name_corto','ASC')
            ->select('id', 'rut', 'name_corto','name', 'tipo','actividad','direccion','region','comuna','ciudad','codpostal',
                'email','fono','fe_inicio','tipo_tri','segmento','codigo','giro','fe_notario','notario','repertorio','fe_diario',
                'reg_comercio','notas','created_at')
            ->get();
       return  $empresas;
    }

    public function headings(): array
    {
        return [
            '#',
            'rut',
            'Nickname',
            'Nombre',
            'Tipo de Sociedad',
            'Actividad comercial',
            'Direccion',
            'Region',
            'Comuna',
            'Ciudad',
            'Codigo Postal',
            'Email',
            'Telefonos',
            'Fecha inicio SII',
            'Tipo Tributacion',
            'Segmento SII',
            'Codigo Actividad',
            'Giro SII',
            'Fecha Escritura',
            'Notaria',
            'Repertorio',
            'Fecha Diario Of.',
            'Registro Comercio',
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

