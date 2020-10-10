<?php

namespace App\Http\Controllers\Tablas;

use App\Imports\UnidadvalorsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Tablas\unidadvalor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kamaln7\Toastr\Facades\Toastr;
use App\Models\varias\help;

class UnidadvalorController extends Controller
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
    public function index(){
       /* if ($request->elano == null) {
              $request->elano = setting('ano'); $request->elano
           }
       // al index hay que agregar recues */
       $helps = help::find(1);
       $valores = unidadvalor::with('meses')
        ->where('ano',setting('ano'))
            ->get();
          $view = 'index';
          $elano = setting('ano');
          return view('tablas.indices.index',compact( 'view','valores','elano','helps'));

       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $valors = DB::table('unidadvalores')
            ->where('ano', setting('ano'))
            ->first();
        if ($valors == null) {
           $array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
                foreach ($array as &$valors) {
                    $unidad = new unidadvalor();
                    $unidad->ano = setting('ano');
                    $unidad->meses_id = $valors;
                    $unidad->utm = null;
                    $unidad->ipc = null;
                    $unidad->ipca = null;
                    $unidad->save();
                   }
                $message = 'se agrego el año' . setting('ano');
                $title = "Valores de unidades";
                Toastr::error($message, $title);
                return $this->index();
             }
         Else{
            // return $this->index()->with('error','Hay datos para el año '.setting('ano'));
           $message='Hay datos para el año '.setting('ano');
            $title = "";
            Toastr::error($message, $title);
             return $this->index();
            }
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\unidadvalor  $unidadvalor
     * @return \Illuminate\Http\Response
     */
    public function show(unidadvalor $unidadvalor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\unidadvalor  $unidadvalor
     * @return \Illuminate\Http\Response
     */
    public function edit(unidadvalor $unidadvalor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\unidadvalor  $unidadvalor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    public function updatenew(Request $request)
    {
        if ($request->ajax()) {
            unidadvalor::find($request->input('pk'))->update([$request->input('utm') => $request->input('value')]);
            unidadvalor::find($request->input('pk'))->update([$request->input('ipc') => $request->input('value')]);
            unidadvalor::find($request->input('pk'))->update([$request->input('ipca') => $request->input('value')]);
            return response()->json(['success' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\unidadvalor  $unidadvalor
     * @return \Illuminate\Http\Response
     */
    public function destroy(unidadvalor $unidadvalor)
    {
        //
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:1024',
        ]);

       $file = $request->file('file');
      if ($file == null) {
            return back()->with('error','Seleccione un archivo a importar');
      }
      else {
            $valors = DB::table('unidadvalores')
                ->where('ano', setting('ano'))
                ->first();
             if ($valors == null){
                 Excel::import(new UnidadvalorsImport, $file);
                 return back()->with('message', 'Importacion de datos para el año'.setting('ano').' esta efectuada');
            }
            else{
                DB::table('unidadvalores')->where('ano', setting('ano'))->delete();
                Excel::import(new UnidadvalorsImport, $file);
                return back()->with('message', 'Importacion de datos para el año '.setting('ano').' esta efectuada, Se eliminaron los datos antriores');
            }
      }
    }
}
