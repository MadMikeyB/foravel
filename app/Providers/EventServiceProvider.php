<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\PostWasViewed' => [
            'App\Listeners\PostWasViewedListener',
        ],
        'App\Events\PageWasViewed' => [
            'App\Listeners\PageWasViewedListener',
        ],
        'App\Events\UserRegistered' => [
            'App\Listeners\UserRegisteredListener',
        ],
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\UserLoggedInListener@handle',
        ],
        'App\Events\ThreadCreated' => [
            'App\Listeners\ThreadCreatedListener',
        ],
        'App\Events\ForumPostCreated' => [
            'App\Listeners\ForumPostCreatedListener',
        ],
        'App\Events\PostCreated' => [
            'App\Listeners\PostCreatedListener',
        ],
        'App\Events\CommentCreated' => [
            'App\Listeners\CommentCreatedListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
