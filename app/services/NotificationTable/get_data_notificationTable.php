<?php 

namespace App\services;

use App\Models\User;
use App\Models\NotificationTable;

class get_data_notificationTable{

    public function __construct()
    {
      return  $this->get();
    }

    public function get()
    {
        $user = User::findOrFail(4);
        $data = $user->notification()->where( 'user_id' , 4 )->pluck('chat_id');
        return $data;
    }

}