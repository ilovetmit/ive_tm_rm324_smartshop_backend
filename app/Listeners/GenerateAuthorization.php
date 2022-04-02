<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Redis;
use App\Events\MissionCompleted;

class GenerateAuthorization
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
     * @param  object  $event
     * @return void
     */
    public function handle(MissionCompleted $event)
    {
        $lists = (Redis::exists($event->missionId)) ? unserialize(Redis::get($event->missionId)) : [];
        $lists[] = $event->userId;

        Redis::set($event->missionId, serialize($lists));
    }
}
