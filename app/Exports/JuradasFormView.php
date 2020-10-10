<?php

namespace App\Exports;


use App\models\empresas\empresa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class JuradasFormView implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('Exports.Juradasexport', [
                'empresas' => empresa::with('juradas')->get()
        ]);
    }


}
