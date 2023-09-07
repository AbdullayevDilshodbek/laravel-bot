<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Telegram\Bot\Laravel\Facades\Telegram;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    const BOT_BASE_URL = 'https://api.telegram.org/bot'; // env('TELEGRAM_BOT_TOKEN');
}
