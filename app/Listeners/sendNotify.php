<?php

namespace App\Listeners;


use App\Events\webDown;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\checkWebNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;



class sendNotify
{

    public function __construct()
    {
        //
    }

    public function handle(webDown $event)
    {
        $data = $event->user;
        Notification::send($data , new checkWebNotification($data)); 
    }
}
