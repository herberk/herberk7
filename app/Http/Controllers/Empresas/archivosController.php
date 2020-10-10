<?php

namespace App\Http\Controllers\Empresas;


use App\Http\Requests\Archivo\CreateDirectorioRequest;
use App\Http\Requests\Archivo\EditDirectorioRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Archivo\CreateFileRequest;
use App\Models\empresas\empresa;
use App\Models\archivos\directorio;
use App\Models\archivos\fichero;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Kamaln7\Toastr\Facades\Toastr;

class archivosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

 // listado de empresas con sus directorios y archivos
    public function show(){
        $categoris = directorio::with('ficheros')->get();
        $view = 'index';
        $empresas = empresa::with('directorios')
            ->orderBy('name_corto')
            ->get();
        return view('archivos.listafiles', compact('empresas','categoris','view'));
    }

// Seccion para manejar directorios o categorias
    public function listacat() {
        $directorio = directorio::query()
            ->withCount('ficheros')
            ->get();

        $categori = directorio::with('empresas')
            ->withCount('ficheros')
            ->orderBy('ano','asc')
            ->get();

        return view('archivos.listadirectorio',[
            'categoris'=>$categori,
             'directorio'=>$directorio,
            'view' => 'index',
        ]);
    }

    public function create(){
        $empresas = empresa::orderBy('name_corto','ASC')->get();
        $view = 'create';
        $categori = new directorio();
        return view('archivos.modal', compact('categori','empresas','view'));
    }

    public function store(CreateDirectorioRequest $request) {
        $directorios = new directorio();
        $directorios->ano = $request->ano;
        $directorios->name = $request->ano.'  '.$request->name;
        $directorios->empresas_id = $request->empresa_id;
        $directorios->save();

        $message='El directorio '. $directorios->name.' fue Guardadoa';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("listacategori");

    }

    public function edit($id)
    {
        $empresas = empresa::orderBy('name_corto','ASC')->get();
        $categori = directorio::findOrFail($id);
        $view = 'edit';
        return view('archivos.modal', compact('categori','empresas','view'));
    }

    public function update(EditDirectorioRequest $request, $id)
    {
        $directorios=directorio::findOrFail($id);

        $directorios->ano = $request->ano;
        $directorios->name = $request->name;
        $directorios->empresas_id = $request->empresa_id;
        $directorios->save();
        $message='El directorio '.$directorios->name.' fue modificado';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("listacategori");
    }
    public function destroy( $id)
    {
//        abort_if($profession->profiles()->exists(), 400, 'Cannot delete a profession linked to a profile.');
        $categoriupload = directorio::findOrFail($id);
        $categoriupload->delete();
        $message='El directorio fue eliminado';
        $title = "";
        Toastr::Warning($message, $title);
        return redirect()->route("listacategori");
    }


 //   Seccion para manejar archivos o files
    public function index()  {
        $view = 'index';
        $files = fichero::orderBy('created_at', 'desc')->paginate(15);
        return view('archivos.files', compact('files','view'));
    }

    public function filecreate(){
        $empresas = empresa::orderBy('name_corto','ASC')->get();
        $view = 'createfile';
        $directori = directorio::all(); ///solo los de la selecion
        $file = new fichero();
        return view('archivos.modal', compact('file','empresas','directori','view'));
    }

    public function storefile(CreateFileRequest $request) {
        $file = $request->file('file');
        $nombre = $file->getClientOriginalName();
        $empresa = DB::table('empresas')->where('id',$request->empre_id)->value('name_corto');
        $directorio = DB::table('directorios')->where('id',$request->dir_id)->value('name');
        $rura = 'empresas'.'/'.$empresa.'/'.$directorio;
//        \Storage::disk('public')->put($nombre,  \File::get($file));
        $file = $request->file->storeAS($rura,$nombre);

        $ficheros = new fichero();
        $ficheros->name = $nombre;
        $ficheros->size = $request->file('file')->getSize();
        $ficheros->extension = $request->file('file')->getClientOriginalExtension();
        $ficheros->public_url = $file;
        $ficheros->directorio = $directorio;
        $ficheros->directorio_id = $request->dir_id;
        $ficheros->empresa =  $empresa;
        $ficheros->empresas_id = $request->empre_id;
        $ficheros->save();
        $message='El archivo '.$nombre.'  fue subido';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("fileslista");

    }
    public function download(File $file)
    {
        dd($file);
        return Storage::disk('dropbox')->download($file->name);
    }
//   Eliminacion de archivos no funciona  el file path esta malo
    public function destroyfile($id)
    {
        $ficheros = fichero::findOrFail($id);

        $file_path ="C:/laragon/www/HerBerk/public/storage/Empresas/".$ficheros->empresa.'/'.$ficheros->directorio.'/'.$ficheros->name;
       if(file_exists($file_path)){     //  if(file_exists('backend_assets/uploads/userPhoto/'.$data->photo) AND !empty($data->photo)){
           unlink($file_path);
           Storage::delete($file_path);
           $ficheros->delete();
           $message='El archivo "'.$ficheros->name.'"  fue eliminado';
           $title = "";
           Toastr::success($message, $title);
           return redirect()->route("fileslista");
       }else{
           $message='El archivo "'.$ficheros->name.'"  NO se elimino';
           $title = "";
           Toastr::success($message, $title);
           return redirect()->route("fileslista");
       }

    }

}
