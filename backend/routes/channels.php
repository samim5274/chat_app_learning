<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\DB;
use App\Models\Conversation;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('conversation.{conversationId}', function ($user, $conversationId) {
    $conversation = Conversation::find($conversationId);
    if (! $conversation) return false;

    return $conversation->participants()
        ->where('users.id', $user->id)
        ->exists();
});

// Broadcast::channel('conversation.{conversationId}', function ($user, $conversationId) {
//     return true;
// });