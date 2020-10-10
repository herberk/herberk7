<?php

namespace App\Http\Controllers\User;

use App\Models\auth\Profession;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProfessionRequest;

use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;

class ProfessionController extends Controller
{
    public function index()
    {
        $professions = Profession::query()
            ->withCount('profiles')
            ->orderBy('title')
            ->get();

        return view('users.professions.index', [
            'professions' => $professions,
        ]);
    }

    public function store(CreateProfessionRequest $request){

        $professions = new Profession();
        $professions->title = $request->title;
        $professions->save();
        $message='La Empresa '.$professions->title.' fue Guardada';
        $title = "";
        Toastr::success($message, $title);
        return redirect()->route("profesiones");
    }

    public function destroy(Profession $profession)
    {
        abort_if($profession->profiles()->exists(), 400, 'Cannot delete a profession linked to a profile.');

        $profession->delete();

        return redirect('profesiones');
    }

  /*  public function postContactForm(Request $request){

        $this->validate($request, [
            'g-recaptcha-response' => ['required', new Recaptcha()]
        ]);

        // Recaptcha passed, do what ever you need

    }*/
}
