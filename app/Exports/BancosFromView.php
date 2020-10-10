<?php
namespace App\Exports;

use App\Models\empresas\banco;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class BancosFromView implements FromView
{
    public function view(): View
    {
        return view('Exports.empresas.Bancosexport', [
            'bancos' =>Banco::with('empresas')->get()
        ]);
    }

}
