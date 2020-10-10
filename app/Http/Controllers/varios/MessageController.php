<?php

namespace App\Http\Controllers\varios;

use App\Events\MessageSentEvent;
use App\Models\varias\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('varias.chat');
    }

    public function fetch(Request $request)
    {
    	$messages = Message::with('user')
            ->where('tipo','1')
             ->orderBy('created_at','desc')   //DESC
            ->paginate(5);
        return [
            'pagination' => [
                'total'         => $messages->total(),
                'current_page'  => $messages->currentPage(),
                'per_page'      => $messages->perPage(),
                'last_page'     => $messages->lastPage(),
                'from'          => $messages->firstItem(),
                'to'           => $messages->lastItem(),
            ],
            'messages' => $messages
        ];
    }

    public function sentMessage(Request $request)
    {
        $user = Auth::user();
    	$message = $user->messages()->create([
    		'message' => request()->message
    	]);
      broadcast(new MessageSentEvent($user, $message));
        /*broadcast(new MessageSent($user, $message))->toOthers();
        return ['status' => 'Message Sent!'];*/
    }
}
