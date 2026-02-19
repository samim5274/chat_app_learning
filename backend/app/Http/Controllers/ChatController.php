<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = "Hello from Laravel with -> " .$request->message;

        broadcast(new MessageSent($message));

        return response()->json([
            "status" => "success",
            "message" => $message
        ]);
    }
}
