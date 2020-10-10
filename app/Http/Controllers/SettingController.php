<?php

namespace App\Http\Controllers;

use App\Exports\ActivityFromView;
use App\Exports\SettingsFromView;
use App\Models\varias\Activity;
USE App\models\varias\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Kamaln7\Toastr\Facades\Toastr;
use Maatwebsite\Excel\Facades\Excel;

class SettingController extends Controller
{

    public function activity() {
        $activites = activity::orderBy('created_at', 'desc')->paginate(20);
        return view('varias.activity_log',compact('activites'));
    }

    public function show()
    {
          $settings = Setting::paginate();
       return view('setting.show',compact('settings'));
    }

    public function index()
    {
        return view('setting.index');
    }



    public function store(Request $request)
    {
        $rules = Setting::getValidationRules();
        $data = $this->validate($request, $rules);
        $validSettings = array_keys($rules);
        foreach ($data as $key => $val) {
            if( in_array($key, $validSettings) ) {
                Setting::add($key, $val, Setting::getDataType($key),$request->get('id_empresa'));
            }
        }
        $message='La configuración se ha guardado.';
        $title = "";
        Toastr::success($message, $title);
        return back()->with('La configuración se ha guardado.');

    }

    public function cacheclear(){
        Artisan::call('cache:clear');
        return redirect()->route("settings");
    }


    public function exportset()
    {
        return Excel::download(new SettingsFromView, 'Settings.xlsx');
    }

    public function exportact()
    {
        return Excel::download(new ActivityFromView, 'Activity.xlsx');
    }
}
