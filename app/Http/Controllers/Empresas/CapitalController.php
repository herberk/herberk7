<?php

namespace App\Http\Controllers\Empresas;

use App\Exports\CapitalExport;
use App\Exports\CapitalFromView;
use App\Http\Requests\Capital\CreateCapitalRequest;
use App\Http\Requests\Capital\EditCapitalRequest;
use App\Models\empresas\Capital;
use App\Models\empresas\valcapital;
use App\models\varias\help;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;
use Maatwebsite\Excel\Facades\Excel;

class CapitalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helps = help::find(2);
        $capital = capital::where('empresas_id',setting('id_empresa'))   //->sum('capitaltri')
        ->orderBy('ano','ASC')
        ->get();
        $view = 'index';
        return view('capital.indexCapi', compact('capital','view','helps'));
    }
    public function trashed(){
        $helps = help::find(1);
        $capital = capital::onlyTrashed()->paginate();
        return view('capital.indexCapi', [
             'helps' => $helps,
            'capital'=>$capital,
            'view' => 'trash',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $capital = capital::where('empresas_id',(setting('id_empresa')))
            ->where('ano',setting('ano'))
            ->first();
        if (empty($capital)){
            $capital = new capital();
            $view ='create';
            return view('capital.newCapital',compact('capital','view'));
        }
        $message='Hay datos para: '.setting('company').' y año '.setting('ano');
        $title = "";
        Toastr::error($message, $title);
        return redirect()->route('capital.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCapitalRequest $request)
    {

        $capitals = new capital();
        $capitals->activo     = $request->activo;
        $capitals->ano       = setting('ano');
        $capitals->empresas_id = setting('id_empresa');
        $capitals->into21    = $request->into21;
        $capitals->into1     = $request->into1;
        $capitals->into2     = $request->into2;
        $capitals->into3     = $request->into3;
        $capitals->into4     = $request->into4;
        $capitals->into5     = $request->into5; //no
        $capitals->into6     = $request->into6;
        $capitals->into7     = $request->into7;
        $capitals->into8     = $request->into8;
        $capitals->into9     = $request->into9;
        $capitals->into22    = $request->into22;
        $capitals->complementa1= $request->complementa1;
        $capitals->complementa2= $request->complementa2;
        $capitals->complementa3= $request->complementa3;
        $capitals->valfinanciero31 = $request->valfinanciero31;
        $capitals->valfinanciero1 = $request->valfinanciero1;
        $capitals->valfinanciero2 = $request->valfinanciero2;
        $capitals->valfinanciero3 = $request->valfinanciero3;
        $capitals->valfinanciero4 = $request->valfinanciero4;
        $capitals->valfinanciero5 = $request->valfinanciero5;
        $capitals->valfinanciero6 = $request->valfinanciero6;
        $capitals->valfinanciero7 = $request->valfinanciero7;
        $capitals-> valfinanciero8 = $request->valfinanciero8;
        $capitals-> valfinanciero9 = $request->valfinanciero9;
        $capitals-> valtributario32 = $request->valtributario32;
        $capitals-> valtributario1 = $request->valtributario1;
        $capitals->valtributario2 = $request->valtributario2;
        $capitals-> valtributario3 = $request->valtributario3;
        $capitals->valtributario4 = $request->valtributario4;
        $capitals->valtributario5 = $request->valtributario5;
        $capitals-> valtributario6 = $request->valtributario6;
        $capitals-> valtributario7 = $request->valtributario7;
        $capitals->valtributario8 = $request->valtributario8;
        $capitals->pasivo51  = $request->pasivo51;
        $capitals->pasivoexigi1  = $request->pasivoexigi1;
        $capitals->pasivoexigi2  = $request->pasivoexigi2;
        $capitals->pasivoexigi3  = $request->pasivoexigi3;
        $capitals->pasivoexigi4  = $request->pasivoexigi4;
        $capitals->pasivoexigi5  = $request->pasivoexigi5;
        $capitals->pasivoexigi6  = $request->pasivoexigi6;
        $capitals->pasivoexigi7  = $request->pasivoexigi7;
        $capitals->pasivoexigi8  = $request->pasivoexigi8;
        $capitals->pasivoexigi9  = $request->pasivoexigi9;
        $capitals->pasivoexigi10  = $request->pasivoexigi10;
        $capitals->pasivoexigi11  = $request->pasivoexigi11;
        $capitals->pasivoexigi12  = $request->pasivoexigi12;
        $capitals->pasivoexigi13  = $request->pasivoexigi13;
        $capitals->capitaltri  = $request->propio;
        $capitals->save();

        $valcapitals = new valcapital();
        $valcapitals->capitaltri  = $request->propio;
        $valcapitals->ano       = setting('ano');
        $valcapitals->capitals_id = $capitals->id;
        $valcapitals->empresas_id = setting('id_empresa');

        $valcapitals->save();
        $message='El capiat propio de la empresa '.setting('company').' se Guardo!';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route('capital.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Capital  $capital
     * @return \Illuminate\Http\Response
     * public function show(Capital $capital)
     */
    public function show($ano){
        $date = date('d-m-Y');
        $capital = capital::where('empresas_id',(setting('id_empresa')))
            ->where('ano',setting('ano'))
            ->first();
        $valcapital = valcapital::where('empresas_id',(setting('id_empresa')))
            ->where('ano', ($ano-1))
            ->first();
        return view('capital.showCapi', compact('capital','date','valcapital'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $capital = capital::where('empresas_id',(setting('id_empresa')))
            ->where('ano',setting('ano'))
            ->first();
        $view ='edit';

        if (empty($capital)){
            $message='No hay datos para: '.setting('company').' y año';
            $title = "";
            Toastr::error($message, $title);
            return redirect()->route('capitalcreate');
        }
        return view('capital.newCapital', compact('capital','view'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    public function update(EditCapitalRequest $request, Capital $capital)
    {
        $capital = capital::where('empresas_id',(setting('id_empresa')))
            ->where('ano',setting('ano'))
            ->first();
        $capital->update([
        'activo'    => $request->activo,
        'ano'       => setting('ano'),
        'empresas_id' => setting('id_empresa'),
        'into21'    => $request->into21,
        'into1'     => $request->into1,
        'into2'     => $request->into2,
        'into3'     => $request->into3,
        'into4'     => $request->into4,
        'into5'     => $request->into5,
        'into6'     => $request->into6,
        'into7'     => $request->into7,
        'into8'     => $request->into8,
        'into9'     => $request->into9,
        'into22'    => $request->into22,
        'complementa1'=> $request->complementa1,
        'complementa2'=> $request->complementa2,
        'complementa3'=> $request->complementa3,
        'valfinanciero31' => $request->valfinanciero31,
        'valfinanciero1' => $request->valfinanciero1,
        'valfinanciero2' => $request->valfinanciero2,
        'valfinanciero3' => $request->valfinanciero3,
        'valfinanciero4' => $request->valfinanciero4,
        'valfinanciero5' => $request->valfinanciero5,
        'valfinanciero6' => $request->valfinanciero6,
        'valfinanciero7' => $request->valfinanciero7,
        'valfinanciero8' => $request->valfinanciero8,
        'valfinanciero9' => $request->valfinanciero9,
        'valtributario32' => $request->valtributario32,
        'valtributario1' => $request->valtributario1,
        'valtributario2' => $request->valtributario2,
        'valtributario3' => $request->valtributario3,
        'valtributario4' => $request->valtributario4,
        'valtributario5' => $request->valtributario5,
        'valtributario6' => $request->valtributario6,
        'valtributario7' => $request->valtributario7,
        'valtributario8' => $request->valtributario8,
        'pasivo51'  => $request->pasivo51,
        'pasivoexigi1'  => $request->pasivoexigi1,
        'pasivoexigi2'  => $request->pasivoexigi2,
        'pasivoexigi3'  => $request->pasivoexigi3,
        'pasivoexigi4'  => $request->pasivoexigi4,
        'pasivoexigi5'  => $request->pasivoexigi5,
        'pasivoexigi6'  => $request->pasivoexigi6,
        'pasivoexigi7'  => $request->pasivoexigi7,
        'pasivoexigi8'  => $request->pasivoexigi8,
        'pasivoexigi9'  => $request->pasivoexigi9,
        'pasivoexigi10'  => $request->pasivoexigi10,
        'pasivoexigi11'  => $request->pasivoexigi11,
        'pasivoexigi12'  => $request->pasivoexigi12,
        'pasivoexigi13'  => $request->pasivoexigi13,
        'capitaltri'     => $request->propio,
        ]);
        $valcapitals = valcapital::where('empresas_id',(setting('id_empresa')))
            ->where('ano',setting('ano'))
            ->first();
        $valcapitals->update([
        'capitaltri'  => $request->propio,
        'ano'       => setting('ano'),
       'empresas_id' => setting('id_empresa'),
//       'capital_id' => $request->id,
        ]);
        $message='El capiat propio de la empresa '.setting('company').' se modificado!';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route('capital.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Capital  $capital
     * @return \Illuminate\Http\Response
     */
    /*   public function destroy(Capital $capital)
    {
        //
    }*/
    public function trash($id)
    {
        $capital = capital::findOrFail($id);
        $capital->delete();
        $message='El capiatl fue Borrado   '." <a href='users/restore/$capital->id'> Click aqui </a> " .  'Para restaurar'  ;
        $title ="";
        Toastr::success($message, $title);
        return redirect()->route('capital.index');
    }

    public function destroy($id)
    {
        // No se ha implementado
        $user = User::onlyTrashed()->where('id', $id)->firstOrFail();
        $user->forceDelete();
        $title = "";
        $message='El Usuario '.$user->name.' fue eliminado permanentemente';
        Toastr::success($message, $title);
        return redirect()->route('users.trashed');

    }
    public function restore( $id )
    {
        //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
        $capital = capital::withTrashed()->where('id', '=', $id)->first();
        //Restauramos el registro
        $capital->restore();
        $title = "";
        $message='El registro fue restaurado';
        Toastr::success($message, $title);
        return redirect()->route('capital.index');
    }

    public function shownotas($id){
        $capital = capital::findOrFail($id);
        $view = 'nota';
        return view('capital.valCapital', compact('capital','view'));
    }
    public function updatenota(Request $request, $id) {
        $capital = capital::findOrFail($id);
        $capital->notas = $request->editor1;
        $capital->save();
        $message='La Nota de '.$capital->ano.' fue Modificada';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("capital.index");
    }

    function exports($ano, $pd) //$id,$pd
    {
        if ($pd <> 3) {
            $date = date('d-m-Y');
            $capital = capital::where('empresas_id',(setting('id_empresa')))
                ->where('ano',$ano)
                ->first();
            $valcapital = valcapital::where('empresas_id',(setting('id_empresa')))
                ->where('ano', ($ano-1))
                ->first();
         }
        if ($pd == 3) {
            return Excel::download((new CapitalFromView())->forYear($ano),'Capital.xlsx');
        } elseif ($pd == 1) {
            $pdf = PDF::loadView('capital.exports.showpdf', compact('date','capital','valcapital'));
            return $pdf->download('capital.pdf');
        } elseif ($pd == 2) {
            $pdf = PDF::loadView('capital.exports.showpdf', compact('date','capital','valcapital'));
            return $pdf->stream('capital.pdf');
        }
    }
    function export()
    {
        return Excel::download(new CapitalExport, 'capitales.xlsx');
    }
}
