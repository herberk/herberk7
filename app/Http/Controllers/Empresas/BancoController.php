<?php

namespace App\Http\Controllers\Empresas;

use App\Exports\BancosFromView;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\empresas\banco;
use App\Models\empresas\empresa;
use Kamaln7\Toastr\Facades\Toastr;
use Maatwebsite\Excel\Facades\Excel;

class BancoController extends Controller
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
    public function index(Request $request) {
        $empresas  = Empresa::with('bancos')->get();
        $bancos = banco::with('empresas')
            ->orderBy('empresas_id','ASC',$request)
            ->paginate(15);
        return view('empresas.bancos.listabancos',[
            'empresas'=> $empresas,
            'bancos'=> $bancos,
            'view' => 'index',
        ]);
    }

    public function trashed(Request $request){
        $empresas  = Empresa::with('bancos')->get();
        $bancos = banco::onlyTrashed()
            ->orderBy('empresas_id','ASC',$request)
            ->paginate(10);
        return view('empresas.bancos.listabancos',[
          'empresas'=> $empresas,
            'bancos'=> $bancos,
            'view' => 'trash',
        ]);
    }

    public function trash( $id)  {
        $bancos = banco::findOrFail($id);
        $bancos->delete();
        $message='El Banco '.$bancos->name.' Fue borrado   '." <a href='/restore/$bancos->id'> CLICK AQUI </a> " .  'para restaurar'  ;
        $title ="";
        Toastr::success($message, $title);
        return redirect()->route("bancosindex");
    }

    public function restore($id) {
        //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
        $bancos = banco::withTrashed()->where('id', '=', $id)->first();
        //Restauramos el registro
        $bancos->restore();
        $message='El Banco '.$bancos->name.' fue RESTAURADO  ';
        $title ="";
        Toastr::success($message, $title);
        return redirect()->route("bancosindex");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(){
        $empresas = empresa::orderBy('name_corto','ASC')->get();
        $view = 'create';
        $bancos = new banco;
        return view('empresas.bancos.modal', compact('bancos','empresas','view'));
    }

    public function store(Request $request)
    {
       $this->validate($request, [
            'name'   => 'required|max:15',
           'ctacte'  => 'required|unique:bancos|max:20',
           'empresa_id'=> 'required'
        ]);
        $bancos = new banco();
        $bancos->name = $request->name;
        $bancos->ctacte = $request->ctacte;
        $bancos->firman = $request->firman;
        $bancos->montoLin = $request->montoLin;
        $bancos->ruta = $request->ruta;
        $bancos->empresas_id = $request->empresa_id;
        $bancos->save();
        $message='El '.$request->name.' fue Guardado';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("bancosindex");
    }

    public function edit($id)  {
          $empresas = empresa::orderBy('name_corto','ASC')->get();
          $bancos = banco::findOrFail($id);
          $view = 'edit';
          return view('empresas.bancos.modal', compact('bancos','empresas','view'));
      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'   => 'required|max:15',
            'ctacte'  => 'required|max:20',
            'empresa_id'=> 'required'
        ]);
        $bancos=banco::findOrFail($id);
        $bancos->name = $request->name;
        $bancos->ctacte = $request->ctacte;
        $bancos->firman = $request->firman;
        $bancos->montoLin = $request->montoLin;
        $bancos->ruta = $request->ruta;
        $bancos->empresas_id = $request->empresa_id;
        $bancos->save();
        $message='El Banco '.$bancos->name.' fue modificado';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("bancosindex");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function shownotas($id){
        $bancos=banco::findOrFail($id);
        $view = 'nota';
        return view('empresas.bancos.modal', compact('bancos','view'));
    }
    public function updatenota(Request $request, $id) {
        $bancos=banco::findOrFail($id);
        $bancos->notas = $request->editor1;
        $bancos->save();
        $message='La Nota de '.$bancos->name.' fue Modificada';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("bancosindex");

    }

    public function updatenew(Request $request)
    {
        if ($request->ajax()) {
            banco::find($request->input('pk'))->update([$request->input('name') => $request->input('value')]);
            banco::find($request->input('pk'))->update([$request->input('ctacte') => $request->input('value')]);
            banco::find($request->input('pk'))->update([$request->input('firman') => $request->input('value')]);
            return response()->json(['success' => true]);
        }
    }
    function export(){
        return Excel::download(new BancosFromView, 'bancos.xlsx');
    }


}
