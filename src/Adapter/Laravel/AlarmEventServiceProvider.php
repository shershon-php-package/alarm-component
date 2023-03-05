<?php


namespace Shershon\Alarm\Adapter\Laravel;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;
use Shershon\Alarm\Contract\MessageEventInterface;

class AlarmEventServiceProvider extends ServiceProvider{

    protected $listen = [
        MessageEventInterface::class => [
            "Shershon\Alarm\Listener\MessageEventListener@process"
        ],
    ];

}