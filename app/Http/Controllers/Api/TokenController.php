<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\services\Json\JsonController;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    
    public function index()
    {
        //
    }

  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $telegramData = new telegramController();
        $telegramMessage = $telegramData->get_telegramMessage();
        $telegramChatId = $telegramData->get_telegramChatID();

        if ($telegramMessage === '/start') {
                Telegram::sendMessage([
                    'chat_id' => $telegramChatId,
                    'text' => "سلام:\n" . $data['message']['chat']['first_name'] . "\n لطفا شناسه کاربری خود را وارد کنید \n"
                ]);
        }   
        if ($telegramMessage != '/start') {
            $token = $telegramMessage;
            $response = new JsonController();
            $response = $response->send($token);
    
            if ($response->status()) {
                NotificationTable::where('token', $token)->update([
                    'chat_id' => $chat_id ,
                    'user_id' => $user_id[ 'id' ]
                ]);
                Telegram::sendMessage([
                    'chat_id' => $chat_id,
                    'text' => $data['message']['chat']['first_name'] . "\nچت ایدی شما:\n" . $chat_id
                ]);
            } else {
                Telegram::sendMessage([
                    'chat_id' => $chat_id,
                    'text' => $data['message']['chat']['first_name'] . "عزیز چت ایدی شما قبلا ثبت شده و دیگر مجاز به استارت نمی باشید."
                ]);
            }
        }
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
