<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Chat\UserController;
use App\Http\Controllers\Api\Chat\ConversationController;
use App\Http\Controllers\Api\Chat\MessageController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ======================
// Public Routes
// ======================
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);

Route::middleware(['auth:sanctum', 'throttle:60,1'])->group(function (){

    Route::post('/send', [ChatController::class, 'send']);

    Route::prefix('chat')->group(function () {
        Route::get('/users', [UserController::class, 'index']);

        Route::post('/conversations/private', [ConversationController::class, 'private']); 
        Route::get('/conversations/{conversation}', [ConversationController::class, 'show']); 

        Route::get('/conversations/{conversation}/messages', [MessageController::class, 'index']);
        Route::post('/conversations/{conversation}/messages', [MessageController::class, 'store']);
    });

});