<?php

namespace App\Imports;

use App\Models\Tablas\unidadvalor;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class UnidadvalorsImport implements ToModel, WithValidation,WithHeadingRow
{
    use Importable;

    public function rules(): array
    {
        return [
//          'file' => 'required|mimes:xlsx,xls|max:1024',
          'mes' => 'required',
          'utm' => 'required|numeric|min:0|max:999999',
          'ipc' => 'required|numeric|min:-100|max:999999',
          'ipca' => 'required|numeric|min:0|max:999999',
       // cinco no hay
        ];

    }
    public function customValidationMessages()
    {
        return [
//            'file.required'      => 'El archvo es requerido',
//            'file.mimes:xlsx,xls'=> 'El archvo debe ser xlsx',
//            'file.max:1024'   =>  'El archivo es max:1024 ',
            'meses_id.required'  => 'El mes requerido.',
            'utm.required'  => 'La UTM es requerido.',
            'utm.numeric'   => 'La UTM es numerico',
            'utm.min:0'     => 'La UTM debe ser a lo menos 1',
            'utm.max:999999'=> 'La UTM debe tener max seis digitod',
            'ipc.required'  => 'EL IPC es requerido.',
            'ipc.numeric'   => 'EL IPC es numerico',
            'ipc.min:0'     => 'EL IPC debe ser a lo menos 1',
            'ipc.max:999999'=> 'EL IPC debe tener max seis digitod',
            'ipca.required' => 'EL IPC anual es requerido.',
            'ipca.numeric'   => 'EL IPC anual es numerico',
            'ipca.min:0'     => 'EL IPC anual debe ser a lo menos 1',
            'ipca.max:999999'=> 'EL IPC anual debe tener max seis digitod',

        ];
    }

    public function model(array $row)
    {
        //limitar la cantidad de registros a 12
        $row['anomes'] = setting('ano').$row['mes'];
        $row['ano'] = setting('ano');
        $row['utma'] = ($row['utm']*12);
        return new unidadvalor([
            'anomes'  => $row['anomes'],
            'ano'  => $row['ano'],
            'meses_id'  => $row['mes'],
            'utm'  => $row['utm'],
            'ipc'  => $row['ipc'],
            'ipca' => $row['ipca'],
            'utma' => $row['utma'],
        ]);
    }
}
