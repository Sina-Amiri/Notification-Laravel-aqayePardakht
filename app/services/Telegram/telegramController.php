<?php

namespace App\services\Telegram;

class telegramController{


    public $data;

    public function get_telegramData()
    {
        $data = file_get_contents( 'php://input' , true );
        $this->data = json_decode( $data , true);
    }

    public function get_telegramMessage()
    {
        $message = $this->data[ 'message' ][ 'text' ];
        return $message;
    }

    public function get_telegramChatID()
    {
        $chat_id = $this->data[ 'message' ][ 'chat' ][ 'id' ];
        return $chat_id;
    }
}