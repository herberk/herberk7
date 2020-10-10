<?php
namespace App\Http\Controllers\Empresas;

use App\models\empresas\empresa_jurada;
use Faker\Provider\DateTime;
use App\Exports\EmpresasExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmpresasRequest;
use App\Http\Requests\EditEmpresasRequest;
use App\Models\empresas\{
    empresa, contacto, jurada, socio,banco };
use Illuminate\Support\Facades\DB;
use Kamaln7\Toastr\Facades\Toastr;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CapitalFromView;
use Barryvdh\DomPDF\Facade as PDF;

class empresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $empresas = empresa::query()
       ->with('juradas')
        ->orderBy('name_corto','ASC')
        ->get();
        return view('empresas.index', [
            'view' => 'index',
            'empresas' => $empresas,
        ]);
    }

    public function trashed(){
        $empresas = empresa::onlyTrashed()->paginate();
        return view('empresas.index', [
            'empresas' => $empresas,
            'view' => 'trash',
        ]);
    }

    public function create() {
         $empresas = new empresa;
         $view ='new';
         $capital ='0';
        return view('empresas.new',compact('empresas','Ciudades','Regiones', 'Comunas','contactos','capital','view'));
    }

    public function storempresa(CreateEmpresasRequest $request){
        $empresas = new empresa();
        $empresas->rut = ltrim($request->rut, "0");
        $empresas->name = $request->name;
        $empresas->name_corto = $request->name_corto;
        $empresas->item_id5 = $request->item_id5;
        $empresas->tipo_empresa =  DB::table('items')->where('id',$request->item_id5)->value('name');
        $empresas->actividad = $request->actividad;
        $empresas->direccion = $request->direccion;
        $empresas->region_id = $request->region_id;
        $empresas->region = DB::table('regiones')->where('id',$request->region_id)->value('name');
        $empresas->comuna_id = $request->comuna_id;
        $empresas->comuna = DB::table('comunas')->where('id',$request->comuna_id)->value('name');
        $empresas->ciudad_id = $request->ciudad_id;
        $empresas->ciudad =  DB::table('ciudades')->where('id',$request->ciudad_id)->value('name');
        $empresas->codpostal = $request->codpostal;
        $empresas->email = $request->email;
        $empresas->fono = $request->fono;
        $empresas->feinicio = DATE_FORMAT( date_create($request->feinicio),"Y-m-d H:i:s");
        $empresas->tipo_tributacion = DB::table('items')->where('id',$request->item_id6)->value('name');
        $empresas->item_id6 = $request->item_id6;
        $empresas->segmento = DB::table('items')->where('id',$request->item_id10)->value('name');
        $empresas->item_id10 = $request->item_id10;
        $empresas->codigo = $request->codigo;
        $empresas->giro = $request->giro;
        $empresas->logo = 'default_logo.jpg';
        $empresas->capital = str_replace(',','',$request->capital);
        $empresas->notario=$request->notario;
        $empresas->fenotario = DATE_FORMAT( date_create($request->fenotario),"Y-m-d H:i:s");
        $empresas->repertorio=$request->repertorio;
        $empresas->nro_edicion=$request->nro_edicion;
        $empresas->fediario = DATE_FORMAT( date_create($request->fediario),"Y-m-d H:i:s");
        $empresas->reg_comercio=$request->reg_comercio;
        $empresas->save();
        $message='La Empresa '.$empresas->name.' fue Guardada';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("empresaindex");
    }

    public function show($id){
        $capital = $this->suma($id);
        $socios = Socio::where('empresas_id',($id))->get();
        $bancos = Banco::where('empresas_id',($id))->get();
//        $juradas = jurada::where('empresa_id',($id))->get();
        $contactos = Contacto::where('empresas_id',($id))->get();
        $empresas = empresa::findOrFail($id);
        $view ='show';
        return view('empresas.show', compact('empresas','view','contactos','capital','socios','bancos'));
    }


    public function edit($id){
        $capital = $this->suma($id);
        $contactos = Contacto::where('empresas_id',($id))->get();
        $empresas = empresa::findOrFail($id);
        $view ='edit';
//      dd($empresas);
        return view('empresas.edit', compact('empresas','view','contactos','capital'));
    }
      public function suma($id){
          $capital = Socio::where('empresas_id',($id))->sum('aporte');
          $empresas=empresa::findOrFail($id);
          $empresas->capital = str_replace(',','',$capital);
          $empresas->save();
          return $capital;
      }


    public function update(EditEmpresasRequest $request, $id){
        $emprsas=empresa::findOrFail($id);
        $emprsas->name = $request->name;
        $emprsas->name_corto = $request->name_corto;
        $emprsas->item_id5 = $request->item_id5;
        $emprsas->tipo_empresa = DB::table('items')->where('id',$request->item_id5)->value('name');
        $emprsas->actividad = $request->actividad;
        $emprsas->direccion = $request->direccion;
        $emprsas->region_id = $request->region_id;
        $emprsas->region = DB::table('regiones')->where('id',$request->region_id)->value('name');
       /* $emprsas->comuna_id = $request->comuna_id;
        $emprsas->comuna = DB::table('comunas')->where('id',$request->comuna_id)->value('name');*/
        $emprsas->ciudad_id = $request->ciudad_id;
        $emprsas->ciudad = DB::table('ciudades')->where('id',$request->ciudad_id)->value('name');
        $emprsas->codpostal = str_replace(',','',$request->codpostal);
        $emprsas->email = $request->email;
        $emprsas->fono = $request->fono;
        if ($request->state=='active'){
          $emprsas->active = '1';
              } else{
            $emprsas->active = '0';
        }
        $emprsas->feinicio = DATE_FORMAT( date_create($request->feinicio),"Y-m-d H:i:s");   //$request->feinicio;
        $emprsas->tipo_tributacion = DB::table('items')->where('id',$request->item_id6)->value('name');
        $emprsas->item_id6 = $request->item_id6;
        $emprsas->segmento = DB::table('items')->where('id',$request->item_id10)->value('name');
        $emprsas->item_id10 = $request->item_id10;
        $emprsas->codigo = $request->codigo;
        $emprsas->giro = $request->giro;
        $emprsas->notario=$request->notario;
        $emprsas->fenotario= DATE_FORMAT( date_create($request->fenotario),"Y/m/d H:i:s");   //$request->fe_notario;
        $emprsas->repertorio=$request->repertorio;
        $emprsas->nro_edicion=$request->nro_edicion;
        $emprsas->fediario= DATE_FORMAT( date_create($request->fediario),"Y/m/d H:i:s");  //$request->fe_diario;
        $emprsas->reg_comercio=$request->reg_comercio;
        $emprsas->notas = $request->editor1;
        $emprsas->save();
        $message='La Empresa '.$emprsas->name.' fue Modificada';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("empresaindex");
//      $emprsas->rut no se cambia al editar. capital y logo tienen un proceso distinto);
    }

    public function shownotas($id){
        $empresas = empresa::findOrFail($id);
        $view = 'nota';
        return view('empresas.note', compact('empresas','view'));
    }


    public function updatenota(Request $request, $id) {
        $emprsas=empresa::findOrFail($id);
        $emprsas->notas = $request->editor1;
        $emprsas->save();
        $message='La Nota de '.$emprsas->name.' fue Modificada';
        $title = "";
        Toastr::success($message, $title);
       return redirect()->route("empresaindex");

    }


    public function trash(Empresa $empresa)
    {
        $empresa->delete();
//        $empresa->profile()->delete();
        $message='El Usuario '.$empresa->name.' fue Borrado   '." <a href='empresas/restore/$empresa->id'> Click aqui </a> " .  'Para restaurar';
        $title ="";
        Toastr::success($message, $title);
        return redirect()->route('empresaindex');   //->with("deleted" , $user );
    }

    public function restore( $id )
    {
        //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
        $empresas = empresa::withTrashed()->where('id', '=', $id)->first();
        $empresas->restore();
        $message='La empresa '.$empresas->name_corto.' fue RESTAURADA  ';
        $title ="";
        Toastr::success($message, $title);
        return redirect()->route("empresaindex");

    }
    public function destroy($id){
        $message='La empresa no se puede eliminar ';
        $title ="";
        Toastr::Error($message, $title);
        return redirect()->route("empresaindex");
    }

    public function logo($id){
        $empresas=empresa::findOrFail($id);
        $view = 'logo';
        return view('empresas.note', compact('empresas','view'));

    }
    public function update_logo($id, Request $request){
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:2024',
        ]);
        $empresas=empresa::findOrFail($id);
        $logoName = $empresas->id.'_logo'.time().'.'.request()->logo->getClientOriginalExtension();
        $request->logo->storeAs('logos',$logoName);
        $empresas->logo = $logoName;
        $empresas->save();
        $title = "";
        $message='Has subido exitosamente el logo.';
        Toastr::success($message, $title);
        return redirect()->route("empresaindex");
    }

    public function selecjurada($id){
        $empresas = empresa::findOrFail($id);
        $juradas = jurada::orderBy('nro_dj','ASC')->get();
        $view = 'seljurada';
        return view('empresas.note', compact('empresas','juradas', 'view'));
    }

    public function update_seljurada(Request $request, $id)
    {
        $emprsas = empresa::findOrFail($id);
        if ($request->juradas != null) {
            $emprsas->juradas()->sync($request->juradas ?: ['estado','arti_id','anot'=>$request->anot]);
        }

        $message = 'La Declaracion Jurada de ' . $emprsas->name . ' fue Modificada';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("empresaindex");
    }

    function exports($id, $pd) //$id,$pd
    {
        if ($pd <> 3) {
              $date = date('d-m-Y');
            $capital = $this->suma($id);
            $socios = Socio::where('empresas_id',($id))->get();
            $bancos = Banco::where('empresas_id',($id))->get();
            $contactos = Contacto::where('empresas_id',($id))->get();
            $empresas = empresa::findOrFail($id);
            $view ='pdf';
            if (empty($capital)){
                $message='No hay datos para: '.setting('company').' y año';
                $title = "";
                Toastr::error($message, $title);
                return redirect()->route('capitalcreate');
            }
        }
        if ($pd == 3) {
            return Excel::download(new CapitalFromView(),'Capital.xlsx');
            //  return $this->excel->download((new UsersExport())->forYear(2018), 'users.xlsx');
        } elseif ($pd == 1) {
            $pdf = PDF::loadView('empresas.exports.pdf_show', compact('empresas','contactos','bancos','socios','date','capital','view'));
            return $pdf->download('empresa.pdf');
        } elseif ($pd == 2) {
            $pdf = PDF::loadView('empresas.exports.pdf_show', compact('empresas','contactos','bancos','socios','date','capital','view'));
            return $pdf->stream('empresas.pdf');
        }
    }

    function export()
    {
        return Excel::download(new EmpresasExport, 'empresas.xlsx');
    }
}
