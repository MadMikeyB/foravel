<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegisteredListener
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        // Send a welcome email / PM / whatever

        // Do something else here.. set a flag to prompt for info.. etc.

        // create user XP row
        $event->user->xp()->create([]);
        // Give user XP for registering
        $event->user->xp()->increment('points', 100);
    }
}
