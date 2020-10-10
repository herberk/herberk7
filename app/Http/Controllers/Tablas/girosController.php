<?php

namespace App\Http\Controllers\Tablas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Tablas\giros;
use App\Models\Tablas\girosbs;
use App\Models\Tablas\girosas;
use Maatwebsite\Excel\Excel;

class girosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function giros(Request $request){
        $view = 'index';
        $girosas = girosas::with('girosbs')->get();
        $giros = giros::get();
        return view('tablas.giros.index',compact( 'girosas','giros','view'));
    }

    function exports() {
       return view('shared._enconstrucion');
    }

}
