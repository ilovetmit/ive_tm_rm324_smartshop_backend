<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ObjectDetection implements ShouldBroadcast {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $object;

    public function __construct($object) {
        $this->object = $object;
    }

    public function broadcastOn() {
        return new Channel('object');
    }

    public function broadcastWith() {
        return [
            'data' => $this->object
        ];
    }

}
