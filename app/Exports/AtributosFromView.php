<?php

namespace App\Exports;

use App\Models\Tablas\Atributo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;



class AtributosFromView implements  FromView

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('Exports.Atributoexport', [
            'atributos' =>Atributo::with('Tipos')->get()
        ]);
    }



}
