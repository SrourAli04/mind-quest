<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;

Route::get('/', function () {
    return view('home');
});

Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot');

Route::post('/chat/response', [ChatbotController::class, 'chatResponse'])->name('chat.response');

Route::get('/home', function () {
    return view('home');
});

Route::get('/chatbottest', [ChatbotController::class, 'index2']);
Route::post('/chatbottest/send', [ChatbotController::class, 'sendMessage']);
