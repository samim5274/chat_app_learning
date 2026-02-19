<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Api\Auth\LoginController;

// ======================
// Public Routes
// ======================
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);

Route::middleware(['auth:sanctum', 'throttle:cart'])->group(function (){

    Route::post('/send', [ChatController::class, 'send']);

});