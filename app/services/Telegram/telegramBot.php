<?php

namespace App\services;

use NotificationChannels\Telegram\TelegramMessage;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Models\NotificationTable;
use App\Models\User;

class telegramBot{

    public function store_chatId( $data ) 
    {
        $chat_id = $data[ 'message' ][ 'chat' ][ 'id' ];

        if ( $data[ 'message' ][ 'text' ] === '/start' )
        {
               Telegram::sendMessage([
                    'chat_id' => $chat_id,
                    'text' => "سلام:\n" . $data[ 'message' ][ 'chat' ][ 'first_name' ] ."\n لطفا شناسه کاربری خود را وارد کنید \n"
                ]);
        }
         
        if ( $data [ 'message' ][ 'text' ] != '/start' ) 
        {    
                $token = $data[ 'message' ][ 'text' ];
                $user_id = User::where( 'randcode' , $token )->first();
                
                if ( !empty ( $user_id ) ) 
                {
                    NotificationTable::where( 'token' , $token )->update([
                        'chat_id' => $chat_id ,
                        'user_id' => $user_id[ 'id' ]
                    ]);
                    Telegram::sendMessage([
                        'chat_id' => $chat_id,
                        'text' => $data[ 'message' ][ 'chat' ][ 'first_name' ] . "\nچت ایدی شما:\n" . $chat_id
                    ]);
                }else
                {
                    Telegram::sendMessage([
                        'chat_id' => $chat_id,
                        'text' => $data[ 'message' ][ 'chat' ][ 'first_name' ] . "عزیز چت ایدی شما قبلا ثبت شده و دیگر مجاز به استارت نمی باشید."
                    ]);
                }
        }
    }


}