<?php

namespace App\Providers;

use App\Providers\downWeb;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendSms
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\downWeb  $event
     * @return void
     */
    public function handle(downWeb $event)
    {
        //
    }
}
