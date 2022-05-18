<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Kavenegar\LaravelNotification\KavenegarChannel;
use NotificationChannels\Telegram\TelegramMessage;
use NotificationChannels\Telegram\TelegramChannel;
use App\channles\webDownMessage;
use Kavenegar;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use App\Models\User;
use App\Models\NotificationTable;

class checkWebNotification extends Notification
{
    use Queueable;

    public $data;

    public function __construct($data)
    {    
        $this->data = $data;
    }

    public function via($notifiable)
    {    
        return ['mail', TelegramChannel::class, KavenegarChannel::class, 'slack'];
    }

    public function toMail($notifiable)
    {   
        return (new sendMail($this->data))->to($notifiable->email);
    }

    public function toSms($notifiable)
    {    
       return "salam";   
    }

    public function toSlack($notifiable)
    {
        return (new SlackMessage)->content('your website is down!!!');
    }

    public function toTelegram($notifiable)
    { 
        return TelegramMessage::create()
        ->to( $notifiable->chat_id )
        ->content( $this->data );
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
