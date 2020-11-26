<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


class QRCodeLogin implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $event_name;
    public $data;

    /**
     * Create a new event instance.
     *
     * @param $event_name
     * @param $one_time_password
     */
    public function __construct($event_name, $one_time_password)
    {
        $this->event_name = $event_name;
        $this->data = ($one_time_password != 'REFRESH') ? $one_time_password : 'REFRESH';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('qrcodeLogin');
    }

    public function broadcastAs()
    {
        return $this->event_name;
    }

    public function broadcastWith()
    {
        return [
            'data' => $this->data
        ];
    }
}
