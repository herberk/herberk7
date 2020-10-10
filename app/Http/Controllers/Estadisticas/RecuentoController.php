<?php

namespace App\Http\Controllers\Estadisticas;

use App\Exports\estadisticas\{EstadisticasExport,EstadisticasFormView};
use App\Models\Tablas\meses;
use App\Http\Requests\Estadisticas\{CreateEstadisticaRequest, EditEstadisticaRequest};
use App\Models\estadisticas\recuento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class RecuentoController extends Controller
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
    public function datoempre(){
        $recuentos = recuento::where('empresas_id',setting('id_empresa'))
            ->orderBy('ano','asc')   //Order direction must be "asc" or "desc".substr("diego", 0, -1)
            ->orderBy('meses_id','asc')
            ->paginate(12);
        return $recuentos;
      }

    public function index()
    {
        $recuentos=$this->datoempre();
        $view = 'index';
        $formu = 'new';
        Return view('estadisticas.index_esta',compact('view','formu','recuentos'));
    }

    public function trashed()
    {
        $recuentos = recuento::onlyTrashed()->paginate(12);
        $view = 'trash';
        $formu = 'nain';
        Return view('estadisticas.index_esta',compact('view','formu','recuentos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEstadisticaRequest $request)
    {
        $mesano = DB::table('recuentos')
            ->where('ano', setting('ano') )
            ->where('meses_id' ,$request->mes)
            ->where('empresas_id',setting('id_empresa'))
            ->where('deleted_at',setting('Null'))
            ->first();
        if ($mesano == null) {
             $request->createEstadistica();
              return back()->with('message', 'Los datos  estan guardados');
        }
        else{
            return back()->with('error', 'El mes y año ya existen en los registros');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\recuento  $recuento
     * @return \Illuminate\Http\Response
     */
    public function show(recuento $recuento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\recuento  $recuento
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $mes  = recuento::with('meses')->get();
        $view = 'index';
        $recuentos=$this->datoempre();
        $rec = recuento::findOrFail($id);
        $formu= 'edit';
        return view('estadisticas.index_esta', compact('view','formu','recuentos','rec','mes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\recuento  $recuento
     * @return \Illuminate\Http\Response
     */
    public function update(EditEstadisticaRequest $request, $rec)
    {
        $request->updateUser($rec);
        return redirect()->route("estadistica.index")->with('message', 'Los datos del año '.setting('ano').' fueron modificados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\recuento  $recuento
     * @return \Illuminate\Http\Response
     */

    public function trash( $id)  {
        $recuentos = recuento::findOrFail($id);
        $recuentos->delete();
        return back()->with('message', 'Los datos del mes   estan borrados');
    }

    public function restore($id) {
        //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
        $recuentos = recuento::withTrashed()->where('id', '=', $id)->first();
        //Restauramos el registro
        $recuentos->restore();
        return back()->with('message', 'Los datos del mes fueron restaurados  ');
    }


    public function destroy($id)
    {
       dd('destroy');
        recuento::find($id)->delete();
        return back()->with('error', 'Los datos del mes Eliminados permanentemente ');
    }

    function export(){
     //   return Excel::download(new EstadisticasExport, 'estadistica.xlsx');  //->forYear($ano),
       return Excel::download(new EstadisticasFormView(),'estadistica.xlsx');
    }
}
