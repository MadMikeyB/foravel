<?php

namespace App\Events;

use App\ForumPost;
use App\User;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ForumPostCreated extends Event
{
    use SerializesModels;

    public $user;
    public $post;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, ForumPost $post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
