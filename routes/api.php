<?php

use App\Http\Controllers\BotController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get_me', [BotController::class, 'getMe']);
Route::get('send_message', [BotController::class, 'sendMessage']);
Route::get('send_doc', [BotController::class, 'sendDocument']);
Route::get('get_updates', [BotController::class, 'getUpdates']);
