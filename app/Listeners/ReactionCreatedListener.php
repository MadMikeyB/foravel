<?php

namespace App\Listeners;

use App\Events\ReactionCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReactionCreatedListener
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
     * @param  ReactionCreated  $event
     * @return void
     */
    public function handle(ReactionCreated $event)
    {
        $event->user->xp()->increment('points', 100);
    }
}
