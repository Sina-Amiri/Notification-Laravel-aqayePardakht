<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use App\services\NotificationTable\get_data_notificationTable;
//use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;
use NotificationTable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    

    public function routeNotificationForMail($notification)
    {
        return $this->email;
    }

    public function routeNotificationForSms()
    {
        return $this->phone;
    }

    public function routeNotificationForSlack($notification)
    {
        return $this->slack;
    }

    public function routeNotificationForTelegram($notification)
    {   
       $data = new get_data_notificationTable();
       $data = $data -> get();
        return $data;
    }

    public function notification()
    {
        return $this->hasOne( '\App\Models\NotificationTable' , 'user_id');
    }
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'randcode'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
