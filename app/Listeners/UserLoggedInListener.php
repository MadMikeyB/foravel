<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class UserLoggedInListener
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
     * @param  UserLoggedIn  $event
     * @return void
     */
    public function handle($event)
    {
        // Set latest user IP.. 
        // $event->user->update(['ip_address', \Request::getClientIp()]);

        // Give user XP for logging in
        // touches the user table so also updates latest activity
        $event->user->xp()->increment('points', 1);
    }
}
