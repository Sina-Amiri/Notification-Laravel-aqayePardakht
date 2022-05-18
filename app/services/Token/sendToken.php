<?php

namespace App\services;

use kavenegar;
use Kavenegar\KavenegarApi;
use Kavenegar\LaravelNotification;
// send token to phone number for save
class sendToken{

    public $phone;
    public $randCode;
     
    public function __construct( $phone , $randCode)
    { 
        $this->phone = $phone ;
        $this->randCode = $randCode; 
        // $this->sendToken();
    }

    public function sendToken()
    {
        KavenegarApi::VerifyLookup($this->phone, $this->randCode, null, null, ' monitoringdown');
        Kavenegar::Send($sender, $receptor, null);
    }
    
}