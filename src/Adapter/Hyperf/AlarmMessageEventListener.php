<?php


namespace Shershon\Alarm\Adapter\Hyperf;

use Hyperf\Event\Contract\ListenerInterface;
use Shershon\Alarm\Listener\MessageEventListener;

/**
 * Class MessageEventListener
 * @package Shershon\Hyperf\Alarm\Listener
 */
class AlarmMessageEventListener extends MessageEventListener implements ListenerInterface {

}