<?php


namespace App\Http\ViewComposers;

use App\Models\Tablas\{ categoria, item, Regiones, Comunas, Ciudades,
                            girosas, girosbs, giros};
Use App\models\empresas\empresa;
Use App\models\archivos\directorio;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class MakeModelForm
{
    public function compose(View $view) {
        $makeForm = Request::only('region_id', 'comuna_id','ciudad_id','tipo_id','arti_id','empre_id','dir_id',
            'otro', 'giroa_id', 'girob_id','giros_id');

        $reg_com = regiones::orderBy('name', 'ASC')
            ->pluck('name', 'id')
            ->toArray();

        $com_com = array();
         if ($makeForm['region_id'] = null) {
            $com_com = Comunas::where('regiones_id', $makeForm['region_id'])
                ->orderBy('name', 'DESC')
                ->pluck('name', 'id')
                ->toArray();
        }

        $ciu_com = ciudades::orderBy('name', 'ASC')
            ->pluck('name', 'id')
            ->toArray();

        $tipo_com = categoria::orderBy('name', 'ASC')
            ->pluck('name', 'id')
            ->toArray();

     $tot = count($tipo_com);
        for($i = 1; $i <= $tot; $i++ ){
        $art[] = item::where('categoria_id',$i)
              ->orderBy('name', 'DESC')
              ->pluck('name', 'id')
              ->toArray();
      }

        $emp_com = empresa::orderBy('name_corto', 'ASC')
            ->pluck('name_corto', 'id')
            ->toArray();

        $dir_com = array();
        if ($makeForm['dir_id'] = null) {
            $dir_com = directorio::where('empresas_id', $makeForm['dir_id'])
                ->orderBy('name', 'DESC')
                ->pluck('name', 'id')
                ->toArray();
        }

        $giroa_com = girosas::orderBy('name', 'ASC')
            ->pluck('name', 'id')
            ->toArray();

        $girob_com = array();
        if ($makeForm['giroa_id'] = null) {
            $girob_com = girosbs::where('giroa_id', $makeForm['giroa_id'])
                ->orderBy('name', 'DESC')
                ->pluck('name', 'id')
                ->toArray();
        }
        $giros_com = array();
        if ($makeForm['girob_id']= null){
            $giros_com = giros::where('girob_id', $makeForm['girob_id'])
            ->ordeBy('name', 'DESC')
            ->pluk('name', 'id')
            ->toArray();
        }

        $view->with(compact('makeForm','reg_com','com_com','ciu_com','tipo_com','art',
            'emp_com', 'dir_com', 'giroa_com', 'girob_com', 'giros_com'));

    }
}

