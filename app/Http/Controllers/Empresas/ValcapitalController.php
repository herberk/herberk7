<?php

namespace App\Http\Controllers\Empresas;

use App\models\empresas\valcapital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;

class ValcapitalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function edit()
    {
         $valcapital = valcapital::where('empresas_id',(setting('id_empresa')))
            ->where('ano',setting('ano'))
            ->first();
        if (empty($valcapital)){
            $message='No hay datos para: '.setting('company').' y año';
            $title = "";
            Toastr::error($message, $title);
            return redirect()->route('capitalcreate');
        }
        $anomas = setting('ano')+1;
        $view ='edith';
        return view('capital.valCapital', compact('valcapital','view','anomas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, valcapital $valcapital)
    {
//dd($request);
       $valcapital = valcapital::where('empresas_id',(setting('id_empresa')))
            ->where('ano',setting('ano'))
            ->first();
        $valcapital->update([
            'ano'           => setting('ano'),
            'capitaltri'     => $request->capitaltri,
             'pranual'       => $request->pranual,
            'revaloriza'    => $request->revaloriza,
            'resultado'     => $request->resultado,
            'impto'         => $request->impto,
            'primpto'       => $request->primpto,
            'revalimpto'    => $request->revalimpto,
            'retiro'        => $request->retiro,
            'capitalsgte'   => $request->capitalsgte,
            'empresas_id' => setting('id_empresa'),
        ]);
        $message='La validacion del capiat propio de la empresa '.setting('company').' se modificado!';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route('capital.index');
    }
}
