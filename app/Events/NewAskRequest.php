<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewAskRequest implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $destinationPostId;
    public $destinationUserId;
    public $fromId;
    public $fromName;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($destinationPostId, $destinationUserId, $fromId, $fromName)
    {
        $this->destinationPostId = $destinationPostId;
        $this->destinationUserId = $destinationUserId;
        $this->fromId = $fromId;
        $this->fromName = $fromName;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return ['new-ask-for-channel'];
    }
}
