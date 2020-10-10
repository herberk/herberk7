<?php

namespace App\Http\Controllers\Tablas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Tablas\Comunas;
use App\models\Tablas\Regiones;
use App\models\Tablas\Ciudades;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class locacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function locacionesindex(){
        $ciudades = Ciudades::orderBY('name')-> paginate(15);
        $comunas = Comunas::with('regiones')
            ->orderBy('name')
            ->paginate(15);
        $regiones = Regiones::orderBY('name')->get();
     //   dd($ciudades);
        return view('tablas.locaciones.locaciones',compact('regiones','comunas','ciudades'));
    }

    public function create(){
        $ciudades = ciudades::orderBy('name','ASC')->get();
        $view = 'create';
        return view('tablas.locaciones.modal', compact('ciudades','view'));
    }


    public function store(Request $request){
        $this->validate($request, [
            'name'   => 'required|max:25|unique:ciudades',
            'codigo' => 'max:5',
        ]);
        $ciudades=new Ciudades();
        $ciudades->name   = $request->name;
        $ciudades->codigo = $request->codigo;
        $ciudades->save();
        return redirect()->route('locaciones')->with('message', 'La ciudad de '.$request->name.' fue create');
    }

    public function elimina(Request $request, $id){
         $ciudades = Ciudades::find($id);
         $view = 'elimina';
         return view('tablas.locaciones.modal', compact('ciudades','view'));
     }

    public function destroy(Request $request, $id){
        Ciudades::find($id)->delete();
        return redirect()->route('locaciones')->with('error', 'La ciudad de '.$request->name.' fue eliminada');
    }

     public function edit(Request $request, $id){
         $ciudades = Ciudades::find($id);
         $view = 'edit';
         return view('tablas.locaciones.modal', compact('ciudades','view'));
     }


    public function update(Request $request, $id ) {
        $this->validate($request, [
            'name' => 'required|max:25',
            Rule::unique('ciudades')->ignore($request->id),
            'codigo' => 'max:5',
        ]);
        $ciudades = Ciudades::find($request->id);
        $ciudades->name= request('name');
        $ciudades->codigo = request('codigo');
        $ciudades->save();
        return redirect()->route('locaciones')->with('message', 'La ciudad de '.$request->name.' fue modificada');

    }

    public function comunaporregion($id){
       $region = Regiones::where('id',$id)->select('name')->get();
       $comunas = Comunas::where('regiones_id', $id)
            ->orderBy('name', 'ASC')
            ->get();
        $view = 'lista';
        return view('tablas.locaciones.modal', compact('comunas','region','view'));
    }

}

