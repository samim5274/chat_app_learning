<?php

namespace App\Http\Controllers\Api\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conversation;

class ConversationController extends Controller
{
    public function private(Request $request)
    {
        $request->validate([
            'user_id' => ['required','integer','exists:users,id'],
        ]);

        $me = $request->user()->id;
        $other = (int) $request->user_id;

        // find existing conversation between two users
        $existing = Conversation::whereHas('participants', fn($q)=>$q->where('user_id',$me))
            ->whereHas('participants', fn($q)=>$q->where('user_id',$other))
            ->first();

        if ($existing) {
            return response()->json(['success'=>true,'data'=>$existing]);
        }

        $conversation = Conversation::create();
        $conversation->participants()->attach([$me, $other]);

        return response()->json(['success'=>true,'data'=>$conversation], 201);
    }

    public function show(Conversation $conversation, Request $request)
    {
        // extra safety: ensure user is participant
        abort_unless($conversation->participants()->where('users.id',$request->user()->id)->exists(), 403);

        return response()->json(['success'=>true,'data'=>$conversation->load('participants')]);
    }
}
