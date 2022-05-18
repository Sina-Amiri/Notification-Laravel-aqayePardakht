<?php

namespace App\channels;

class webDownMessage{

    public $message;

    public function textMessage($message){

        $this->message = $message;
        return $this;
    }


}