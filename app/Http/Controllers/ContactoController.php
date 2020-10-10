<?php

namespace App\Http\Controllers;

use App\models\varias\message;
use Illuminate\Http\Request;


class ContactoController extends Controller
{

    public function getContact()
    {
        return view('landing.contact');
    }


    public function postContact(Request $request)
    {
         $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message'=>'required',
            'tipo'=>'required',
            'user_id'=>'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        message::create($request->all());
        $notification = array(
            'message' => 'Gracias! Su mensaje se guardo. Le respondere pronto',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function vermensage(){
       $cuantos = 2; // message::cuenta();

        $messages = message::query()
            ->where('tipo','2')
            ->orderBy('created_at')
            ->get();

        return view('varias.mensajes', [
            'messages' => $messages,
            'cuantos'=> $cuantos,
            'view' => 'index',
        ]);

    }
}
