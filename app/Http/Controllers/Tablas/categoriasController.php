<?php

namespace App\Http\Controllers\Tablas;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Tablas\categoria;
use App\Models\Tablas\item;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class categoriasController extends Controller
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
    public function index(Request $request){
        $items = item::all();
        $categorias = categoria::with('items')
        ->orderBY('name')->get();
//       dd($categorias);
        return view('tablas.tipos.categorias',compact('categorias','items'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    {
       $categorias=categoria::all();
        $view = 'create';
        return view('tablas.tipos.modal', compact('view','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name'   => 'required|max:80|unique:categorias',
        ]);
        $categorias=new categoria();
        $categorias->name   = $request->name;
        $categorias->save();
        return redirect()->route('categorias')->with('message', 'La categoria '.$request->name.' fue creado');
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
    public function edit($id) {
        $categorias = categoria::find($id);
        $view = 'edit';
        return view('tablas.tipos.modal', compact('categorias','view'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|max:80',
                 Rule::unique('categorias')->ignore($request->id),
        ]);
        $categorias = categoria::find($request->id);
        $categorias->name= request('name');
        $categorias->save();
        return redirect()->route('categorias')->with('message', 'La categoria '.$request->name.' fue modificada');
    }

    public function elimina(Request $request, $id){
        $categorias = categoria::find($id);
        $items  =  DB::table('items',$id)->where('categoria_id',$id)->first();
        $view = 'elimina';
        return view('tablas.tipos.modal', compact('categorias','view','items'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){
        categoria::find($id)->delete();
        return redirect()->route('categorias')->with('error', 'La categoria  '.$request->name.' fue eliminada');
    }

    //items

    public function createitem(Request $request, $id) {
        $items=item::all();
        $lacate = categoria::find($id);
        $view = 'createitem';
        return view('tablas.tipos.modal', compact('view','items','lacate'));
    }

    public function storeitem(Request $request) {
        $this->validate($request, [
            'name'          => 'required|max:80|unique:categorias',
            'codigo'        => 'max:10',
            'categoria_id'  => 'required',
        ]);
        $items = new item();
        $items->name           = $request->name;
        $items->codigo         = $request->codigo;
        $items->categoria_id   = $request->categoria_id;
        $items->save();
        return redirect()->route('categorias')->with('message', 'El itme '.$request->name.' fue creado');
    }

    public function edititem($id,$lacate) {
        $items = item::find($id);
        $lacate = categoria::find($lacate);
        $view = 'edititem';
        return view('tablas.tipos.modal', compact('items','view','lacate'));
    }

    public function updateitem(Request $request, $id) {
      $this->validate($request, [
            'name' => 'required|max:80',
                 Rule::unique('items')->ignore($request->id),
            'categoria_id'  => 'required',
        ]);
        $items = item::find($request->id);
        $items->name          =  $request->name;
        $items->codigo        = $request->codigo;
        $items->categoria_id   = $request->categoria_id;
        $items->save();
        return redirect()->route('categorias')->with('message', 'El Item '.$request->name.' fue modificada');
    }

    public function eliminaitem($id,$lacate){
        $items = item::find($id);
        $lacate = categoria::find($lacate);
        $view = 'eliminaitem';
        return view('tablas.tipos.modal', compact('categorias','view','items','lacate'));
    }

    public function destroyitem(Request $request, $id){
        item::find($id)->delete();
        return redirect()->route('categorias')->with('error', 'El Item '.$request->name.' fue eliminado');
    }
}
