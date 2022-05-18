<?php

namespace Kavenegar\LaravelNotification;

use Illuminate\Notifications\Notification;
use Kavenegar;
use Kavenegar\KavenegarApi;

class KavenegarChannel
{
    protected $api;

    /**
     * KavenegarChannel constructor.
     * @param KSP $api
     */
    public function __construct(KavenegarApi $api)
    {
        $this->api = $api;
    }

    /**
     * Send the given notification.
     *
     * @param  mixed $notifiable
     * @param  \Illuminate\Notifications\Notification $notification
     * @return void
     * @throws Exception
     */
    public function send($notifiable, Notification $notification)
    {
        $sender = '';
        $receptor = $notifiable->routeNotificationFor('sms');
        $randCode = '123';
        $message = $notification->toSms($notifiable);
        try{
                $result = Kavenegar::VerifyLookup($receptor, $randCode, null, null, ' monitoringdown');
            }
            catch(ApiException $e){
                echo $e->errorMessage();
            }
            catch(HttpException $e){
                echo $e->errorMessage();
            }
        $this->api->Send($sender, $receptor, $message);
    }

}
