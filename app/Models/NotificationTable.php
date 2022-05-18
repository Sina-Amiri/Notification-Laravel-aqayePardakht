<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;

class NotificationTable extends Model
{
    use HasFactory, Notifiable;
    
    protected $fillable = [
        'token',
        'chat_id',
        'user_id'
    ];

   
}
