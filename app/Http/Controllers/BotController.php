<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Telegram\Bot\Actions;
use Telegram\Bot\Api;

class BotController extends Controller
{

    protected $telegram;

    private $botToken;
    private $chatId;
    /**
     * Create a new controller instance.
     *
     * @param  Api  $telegram
     */
    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
        $this->botToken = env('TELEGRAM_BOT_TOKEN');
        $this->chatId = env('TELEGRAM_MY_CHAT_ID');
    }
    public function getMe()
    {
        $response = $this->telegram->getMe();

        return $response;
    }

    public function sendMessage()
    {
        $botToken = $this->botToken;
        $response = Http::post("https://api.telegram.org/bot$botToken/sendMessage", [
            'chat_id' => $this->chatId,
            'text' => 'Hello bro'
        ]);
        return response()->json([
            'error' => false,
            'res' => $response['result']
        ]);
    }

    public function sendDocument()
    {
        $botToken = $this->botToken;
        $path = './2.png'; // or set full path of file

        $response = Http::attach('document', file_get_contents($path), '2.png')
            ->post("https://api.telegram.org/bot$botToken/sendDocument", [
                'chat_id' => $this->chatId
            ]);
        return response()->json([
            'error' => false,
            'res' => $response['result']
        ]);
    }

    public function getUpdates()
    {
        $botToken = $this->botToken;
        $response = Http::get("https://api.telegram.org/bot$botToken/getUpdates",[
            'chat_id' => $this->chatId
        ]);
        return response()->json([
            'error' => false,
            'res' => $response['result']
        ]);
    }
}
