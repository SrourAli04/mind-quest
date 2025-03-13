<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::get('/', function () {
    return view('home');
});

Route::get('/chatbot', [ChatController::class, 'index'])->name('chatbot');

Route::post('/chat/response', [ChatController::class, 'getResponse'])->name('chat.response');

Route::get('/home', function () {
    return view('home');
});

Route::get('/chatbottest', [ChatController::class, 'index2']);
Route::post('/chatbottest/send', [ChatController::class, 'sendMessage']);
