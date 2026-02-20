<?php

namespace App\Http\Controllers\Api\Chat;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Conversation $conversation, Request $request)
    {
        abort_unless($conversation->participants()->where('users.id',$request->user()->id)->exists(), 403);

        $messages = $conversation->messages()
            ->with('sender:id,name,email')
            ->orderBy('id')
            ->get();

        return response()->json(['success'=>true,'data'=>$messages]);
    }

    public function store(Conversation $conversation, Request $request)
    {
        abort_unless($conversation->participants()->where('users.id',$request->user()->id)->exists(), 403);

        $request->validate([
            'body' => ['required','string','max:5000'],
        ]);

        $message = Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => $request->user()->id,
            'body' => $request->body,
        ]);

        $message->load('sender:id,name,email');

        broadcast(new MessageSent($message, $conversation->id))->toOthers();

        return response()->json(['success' => true, 'data' => $message], 201);
    }
}
