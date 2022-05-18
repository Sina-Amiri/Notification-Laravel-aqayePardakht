<?php

namespace App\services;
// json have any method for send and get data json api
class JsonController{
    
    public function send($data)
    {
        $url = '';
        $ch = curl_init($url);  
        $data = array(
            'token' => $data,
        );
        $payload = json_encode(array("user" => $data));       
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);    
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}