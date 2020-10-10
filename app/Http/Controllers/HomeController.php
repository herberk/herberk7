<?php

namespace App\Http\Controllers;

use App\Models\empresas\empresa;
use App\Models\varias\Setting;
use App\Models\varias\accesdir;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Kamaln7\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
// Muestra los direcciones en el escritorio
    public function directorios(){
        $accesdirs = accesdir::orderBy('name') ->where('active','1')
            ->limit(15)->get();
        return $accesdirs;
         }

// selecio de directorios para mostrar en ventana modal
    public function showacces(){
        $accesdirs=$this->directorios();
        $view='accesos';
        return view('shared.modal-sm',compact('view','accesdirs'));
    }

   // muestra todas las direcciones para seleccionar los que usara
    public function selectacces(){
        $accesdirs = accesdir::orderBy('name')
            //   ->take(10)
            ->paginate(15);
        $view='selecdir';
        return view('shared.modal-lg',compact('view','accesdirs'));
    }
        //Procedimiento para guardar las modificaciones a los acesos directo


      public function update(Request $request){
          DB::table('accesdirs')->where('active', 1)->update(array('active'=>0,));
          foreach ($request->get('acces') as $key => $value) {
              $accesdir = accesdir::find($key);
              $accesdir->active = '1';
             $accesdir->update();
          }
          return redirect()->route("home");
      }


      public function index()
     {
         $envs = [
             ['name' => 'PHP version',       'value' => 'PHP/'.PHP_VERSION],
             ['name' => 'Laravel version',   'value' => app()->version()],
             ['name' => 'CGI'   ,            'value' => php_sapi_name()],
             ['name' => 'Uname',             'value' => php_uname()],
            //  ['name' => 'Server',            'value' => Arr::get($_SERVER, 'SERVER_SOFTWARE')],
             ['name' => 'Cache driver',      'value' => config('cache.default')],
             ['name' => 'Session driver',    'value' => config('session.driver')],
             ['name' => 'Queue driver',      'value' => config('queue.default')],
             ['name' => 'Timezone',          'value' => config('app.timezone')],
             ['name' => 'Locale',            'value' => config('app.locale')],
             ['name' => 'Env',               'value' => config('app.env')],
             ['name' => 'URL',               'value' => config('app.url')],
         ];

         $accesdirs=$this->directorios();
         $companies = empresa::orderBy('name_corto','ASC')->get();
         $json = file_get_contents(base_path('composer.json'));
         $dependen = json_decode($json, true)['require'];
         return view('home',compact('accesdirs','companies','dependen','envs'));
     }


     public function selectstore( $id, $view){
 //       si no hay registros en la tabla no los guarda, pues no encuentra. hay que arreglar

         if ($view =='2') {
             $Setting = Setting::findOrFail(1);
             $Setting->name = 'company';
             $Setting->val = DB::table('empresas')->where('id', $id)->value('name_corto');
             $Setting->type = 'string';
             $Setting->save();
             $Setting = Setting::findOrFail(2);
             $Setting->name = 'id_empresa';
             $Setting->val = $id;
             $Setting->type = 'int';
             $Setting->save();
             $empresa = DB::table('empresas')->where('id', $id)->value('name_corto');
             return view('shared.modal-sm', compact('empresa', 'view'));
         }
        if ($view == '1') {
             $empresa = DB::table('empresas')->where('id', $id)->value('name_corto');
             return view('shared.modal-sm', compact('empresa', 'view'));
         }
      }
     public function storeano(Request $request){
         $Setting=Setting::findOrFail(3);
         $Setting->name = 'ano';
         $Setting->val = $request->elano;
         $Setting->type = 'string';
         $Setting->save();
         $message='La empresa '.setting('company').'y el año'.setting('ano').' fueron seleccionados';
         $title = "";
         Toastr::success($message, $title);
         return redirect()->route("home");
      }

// solo para ver los arrays
      Public function Arr_eje(){
          $info = ['nombre' => 'Rafael'];
          $info = Arr::add($info, 'numero', 6);

          $nombres   = ['nombre' => 'Rafael'];
          $telefonos = ['telefono' => '5353647'];
          $datos = Arr::collapse([$nombres, $telefonos]);

          [$keys, $values] = Arr::divide(['nombre' => 'Rafael']);

          $datos1 = Arr::dot(['carro' => ['marca' => 'honda', 'color' => 'negro']]);

          $datos2 = ['marca' => 'honda','color' => 'negro'];
          $filtro = Arr::except($datos, ['color']);

          $digits = [34, 56, 59 ,62, 75];
          $first = Arr::first($digits, function ($value1, $key ) {
              return $value1 >= 80;
          });

          $info = ['nombre' => 'Rafael', 'Carro' => ['Audi', 'Azul']];
          $datos3 = Arr::flatten($info);

          $info1 = ['users' => ['admin' => 'Rafael', 'editor' => 'Luis']];
          Arr::forget($info1, 'users.editor');

          $info2 = ['users' => ['admin' => 'Rafael', 'editor' => 'Luis']];
          $admin = Arr::get($info2, 'users.editor');

          $info3 = ['users' => ['admin' => 'Rafael', 'editor' => 'Luis']];
          $admin1 = Arr::has($info3, 'users.admin');

          $info2 = ['nombre' => 'Laptop', 'precio' => 100, 'unidades' => 10];
          $datos4 = Arr::only($info2, ['nombre', 'unidades']);

          $info2 = [
              ['carro' => ['id' => 1, 'color' => 'Azul']],
              ['carro' => ['id' => 2, 'color' => 'Verde']],
          ];
          $color = Arr::pluck($info2, 'carro.color');

          $numeros = ['uno', 'dos', 'tres', 'cuatro'];
          $numeros = Arr::prepend($numeros, 'cero');

          dd($info, $datos, $keys, $values, $datos1, $datos2, $filtro, $first,
              $datos3, $info1, $admin, $admin1, $datos4, $color, $numeros);

      }
}
