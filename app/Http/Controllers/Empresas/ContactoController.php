<?php

namespace App\Http\Controllers\Empresas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\empresas\contacto;
use App\models\empresas\empresa;
use Kamaln7\Toastr\Facades\Toastr;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ContactosExport;

class ContactoController extends Controller
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
        $contactos = contacto::with('empresas')->get();
        return view('empresas.contactos.listacontactos',[
            'contactos'=>$contactos,
            'view' => 'index',
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $contactos = contacto::onlyTrashed()->paginate();
        return view('empresas.contactos.listacontactos', [
            'contactos' => $contactos,
            'view' => 'trash',
        ]);
    }

    public function create() {
        $empresas = empresa::orderBy('name_corto', 'ASC')->get();
        $view = 'create';
        $contactos = new contacto;
        return view('empresas.contactos.modal', compact('contactos', 'empresas', 'view'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contactos = new contacto();
        $contactos->rut = ltrim($request->rut, "0");
        $contactos->name = $request->name;
        $contactos->email = $request->email;
        $contactos->fono = $request->fono;
        $contactos->empresas_id = $request->empresa_id;
        $contactos->save();

        $message='El contacto '.$contactos->name.' fue Guardadoa';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("listacontactos");
    }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresas = empresa::orderBy('name_corto','ASC')->get();
        $contactos = contacto::findOrFail($id);
        $view = 'edit';
        return view('empresas.contactos.modal', compact('contactos','empresas','view'));
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
        $contactos=contacto::findOrFail($id);
        $contactos->rut = ltrim($request->rut, "0");
        $contactos->name = $request->name;
        $contactos->email = $request->email;
        $contactos->fono = $request->fono;
        $contactos->empresas_id = $request->empresa_id;
        $contactos->save();
        $message='El contacto '.$contactos->name.' fue modificado';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("listacontactos");
    }
    public function shownotas($id){
        $contactos=contacto::findOrFail($id);
        $view = 'nota';
        return view('empresas.contactos.modal', compact('contactos','view'));
    }
    public function updatenota(Request $request, $id) {
        $contactos=contacto::findOrFail($id);
        $contactos->notas = $request->editor1;
        $contactos->save();
        $message='La Nota de '.$contactos->name.' fue Modificada';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("listacontactos");

    }

    public function trash( $id)  {
        $contactos=contacto::findOrFail($id);
        $contactos->delete();
        $message='El Contacto '.$contactos->name.' Fue borrado   '." <a href='contacto/restore/$contactos->id'> CLICK AQUI </a> " .  'para restaurar'  ;
        $title ="";
        Toastr::success($message, $title);
        return redirect()->route("listacontactos");
    }

    public function restore($id) {
        //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
        $contactos=contacto::withTrashed()->where('id', '=', $id)->first();
        //Restauramos el registro
        $contactos->restore();
        $message='El Contacto '.$contactos->name.' fue RESTAURADO  ';
        $title ="";
        Toastr::success($message, $title);
        return redirect()->route("listacontactos");
    }
    public function destroy($id){
        contacto::find($id)->delete();
    }
    function export(){
        return Excel::download(new ContactosExport, 'Contactos.xlsx');
    }


    public function indexnew()
    {
        $data = Contacto::all();
        return view('empresas.contactos.index', compact('data'));
        //$contactos = contacto
    }

    public function updatenew(Request $request)
    {
        if ($request->ajax()) {
            Contacto::find($request->input('pk'))->update([$request->input('name') => $request->input('value')]);
            Contacto::find($request->input('pk'))->update([$request->input('fono') => $request->input('value')]);
            return response()->json(['success' => true]);
        }
    }


}
