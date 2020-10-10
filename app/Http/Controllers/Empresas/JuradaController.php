<?php

namespace App\Http\Controllers\Empresas;

use App\models\Tablas\Atributo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\empresas\empresa;
use App\models\empresas\jurada;
use App\models\empresas\empresa_jurada;
use Illuminate\Support\Facades\DB;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Requests\CreateJuradaRequest;
use App\Http\Requests\EditJuradaRequest;
use App\Exports\JuradasFormView;
use Maatwebsite\Excel\Facades\Excel;

class JuradaController extends Controller
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
        $view = 'index';
        $juradas = jurada::orderBy('nro_dj','ASC')->paginate(12);
        return view('juradas.index', compact('juradas','view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $juradas = new jurada;
        $art_juras = Atributo::where('tipos_id',('9'))
            ->orderBy('name')
            ->get();
        $view ='new';
        return view('juradas.newjurada',compact('juradas','view','art_juras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( CreateJuradaRequest  $request)
    {
        $juradas = new jurada();
        $juradas->nro_dj = DB::table('atributos')->where('id',$request->arti_id)->value('codigo');
        $juradas->arti_id = $request->arti_id;
        $juradas->desc_corta = DB::table('atributos')->where('id',$request->arti_id)->value('name');
        $juradas->fe_vence = DATE_FORMAT( date_create($request->fe_vence),"Y/m/d H:i:s");
        $juradas->descripcion =$request->descripcion;
        $juradas->certificado =$request->certificado;
        $juradas->fe_certifica = DATE_FORMAT( date_create($request->fe_certifica),"Y/m/d H:i:s");
        $juradas->Instruccion = 'ruta a instruccion por defecto';
        $InstruccionName = $juradas->id.'_Instruccion'.time().'.'.request()->Instruccion->getClientOriginalExtension();
        $request->Instruccion->storeAs('Instruccions',$InstruccionName);
        $juradas->Instruccion = $InstruccionName;
        $juradas->Formulario = 'Formulario por defecto';
        $FormularioName = $juradas->id.'_Formulario'.time().'.'.request()->Formulario->getClientOriginalExtension();
        $request->Formulario->storeAs('Formularios',$FormularioName);
        $juradas->Formulario = $FormularioName;
        $juradas->save();
        $message='La Declaracion '.$juradas->desc_corta.' fue Guardada';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("juradas.index");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        $view = 'index';
       $empresas = empresa::with('juradas')
           ->orderBy('name_corto')
           ->get();
        return view('juradas.listjuradas', compact('empresas','view'));  //lista las empresas con sus declaraciones juradas
    }
    public function showedo($id, $jura){
        $view = 'estado';
        $empresa_juradas = empresa_jurada::findOrFail($id);
        return view('juradas.partials._updateestado', compact('empresa_juradas','jura','view'));
    }


    public function ubdateestado(Request $request, $id)
    {
        $empresa_jurada = empresa_jurada::find($request->id);
        $empresa_jurada->arti_id =DB::table('atributos')->where('id',$request->arti_id)->value('id');;
        $empresa_jurada->estado = DB::table('atributos')->where('id',$request->arti_id)->value('name');
        $empresa_jurada->folio = $request->folio;
        $empresa_jurada->save();
        $message='El Estado fue cambiado ';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("infojuradas");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $juradas = jurada::findOrFail($id);
        $art_juras = Atributo::where('tipos_id',('9'))->get();
        $view ='edit';
         return view('juradas.editjurada', compact('juradas','view','art_juras'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditJuradaRequest $request, $id)
    {
        $juradas=jurada::findOrFail($id);
        $juradas->nro_dj = DB::table('atributos')->where('id',$request->arti_id)->value('codigo');
        $juradas->arti_id = DB::table('atributos')->where('id',$request->arti_id)->value('id');
        $juradas->desc_corta = DB::table('atributos')->where('id',$request->arti_id)->value('name');
        $juradas->fe_vence = $request->fe_vence;  //DATE_FORMAT( date_create($request->fe_vence),"Y/m/d H:i:s");
        $juradas->descripcion =$request->descripcion;
        $juradas->certificado =$request->certificado;
        $juradas->fe_certifica = $request->fe_certifica;  //DATE_FORMAT( date_create($request->fe_certifica),"Y/m/d H:i:s");
        if (!empty($request->instruccion)){
            $InstruccionName = $juradas->id.'_Instruccion'.time().'.'.request()->Instruccion->getClientOriginalExtension();
            $request->Instruccion->storeAs('Instruccions',$InstruccionName);
            $juradas->Instruccion = $InstruccionName;}
        if (!empty($request->formulario)){
            $FormularioName = $juradas->id.'_Formulario'.time().'.'.request()->Formulario->getClientOriginalExtension();
            $request->Formulario->storeAs('Formularios',$FormularioName);
            $juradas->Formulario = $FormularioName;}

        $juradas->save();
        $message='La Declaracion '.$juradas->desc_corta.' fue modificada';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("juradas.index");
    }

    public function showinfo($id, $tip){
    if ($tip=='0'){
        $view = 'plantilla';
    }
    else{
        $view = 'instructivo';
    }
        $juradas = jurada::findOrFail($id);
        return view('juradas.nota', compact('juradas','view'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
    }
    public function Exports()
    {
        return Excel::download(new JuradasFormView(), 'juradas.xlsx');
    }
}
