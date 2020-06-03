<?php

namespace VCComponent\Laravel\Comment\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CommentCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $comment;
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
