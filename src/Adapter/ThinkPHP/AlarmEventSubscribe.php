<?php


namespace Shershon\Alarm\Adapter\ThinkPHP;

use think\Event;
use Shershon\Alarm\Contract\MessageEventInterface;
use Shershon\Alarm\Listener\MessageEventListener;

class AlarmEventSubscribe
{
    public function subscribe(Event $event)
    {
        $event->listen(MessageEventInterface::class, [MessageEventListener::class,'process']);
    }

}