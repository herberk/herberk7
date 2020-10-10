<?php

namespace App\Http\Controllers\Empresas;

use App\Exports\SociosExport;
use App\Http\Requests\SociosCreateRequest;
use App\Http\Requests\SociosEditRequest;
use App\models\empresas\empresa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\models\empresas\socio;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;
use Maatwebsite\Excel\Facades\Excel;

class SocioController extends Controller
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
    public function index() {
        $socios = socio::with('empresas')->paginate(15);
        return view('empresas.socios.listasocios',[
            'socios'=>$socios,
           'view' => 'index',
            ]);
    }

    public function trashed(){
        $socios = socio::onlyTrashed()->paginate();
        return view('empresas.socios.listasocios', [
            'socios'=>$socios,
            'view' => 'trash',
        ]);
    }


    public function create(){

        $empresas = empresa::orderBy('name_corto','ASC')->get();
        $view = 'create';
        $socios = new socio;
        return view('empresas.socios.modal', compact('socios','empresas','view'));
    }
    public function store(SociosCreateRequest $request)
    {
        $socios = new socio();
        $socios->rut = ltrim($request->rut, "0");
        $socios->name = $request->name;
        $socios->email = $request->email;
        $socios->fono = $request->fono;
        $socios->rep_legal = $request->rep_legal;
        $socios->porcen = $request->porcen;
        $socios->apopago = $request->apopago;
        $socios->apopend = $request->apopend;
        $socios->aporte = $request->aporte;
        $socios->acciones = $request->acciones;
        $socios->empresas_id = $request->empresa_id;
        $socios->save();

        $message='El Socio '.$socios->name.' fue Guardadoa';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("listasocios");

    }

    public function edit($id)
    {
        $empresas = empresa::orderBy('name_corto','ASC')->get();
        $socios = socio::findOrFail($id);
        $view = 'edit';
        return view('empresas.socios.modal', compact('socios','empresas','view'));
    }


    public function update(SociosEditRequest $request, $id)
    {

        $socios=socio::findOrFail($id);
        $socios->rut = ltrim($request->rut, "0");
        $socios->name = $request->name;
        $socios->email = $request->email;
        $socios->fono = $request->fono;
        $socios->rep_legal = $request->rep_legal;
        $socios->porcen = $request->porcen;
        $socios->apopago = $request->apopago;
        $socios->apopend = $request->apopend;
        $socios->aporte = $request->aporte;
        $socios->acciones = $request->acciones;
        $socios->empresas_id = $request->empresa_id;
        $socios->save();
        $message='El Socio '.$socios->name.' fue modificado';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("listasocios");
    }

    public function shownotas($id){
        $socios = socio::findOrFail($id);
        $view = 'nota';
        return view('empresas.socios.modal', compact('socios','view'));
    }
    public function updatenota(Request $request, $id) {
        $socios=socio::findOrFail($id);
        $socios->notas = $request->editor1;
        $socios->save();
        $message='La Nota de '.$socios->name.' fue Modificada';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("listasocios");

    }

    public function trash( $id)  {
        $socios = socio::findOrFail($id);
        $socios->delete();
        $message='El Socio '.$socios->name.' Fue borrado   '." <a href='socio/restore/$socios->id'> CLICK AQUI </a> " .  'para restaurar'  ;
        $title ="";
        Toastr::success($message, $title);
        return redirect()->route("listasocios");
    }

    public function restore($id) {
        //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
        $socios = socio::withTrashed()->where('id', '=', $id)->first();
        //Restauramos el registro
        $socios->restore();
        $message='El Socio '.$socios->name.' fue RESTAURADO  ';
        $title ="";
        Toastr::success($message, $title);
        return redirect()->route("listasocios");
    }

    function export(){
        return Excel::download(new SociosExport, 'socios.xlsx');
    }
}
