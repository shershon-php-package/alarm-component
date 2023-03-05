<?php


namespace Shershon\Alarm\Listener;

use Shershon\Alarm\Contract\MessageEventInterface;
use Shershon\Alarm\Handler\MessageHandlerFactory;
use Shershon\Common\Util\Support;

/**
 * Class MessageEventListener
 * @package Shershon\Alarm\Listener
 */
class MessageEventListener {

    /**
     * @var MessageHandlerFactory
     */
    protected $handlerFactory;

    public function __construct(MessageHandlerFactory $handlerFactory) {
        $this->handlerFactory = $handlerFactory;
    }

    public function listen(): array {
        return [
            MessageEventInterface::class,
        ];
    }

    protected function getGroupConfig($group){
        return Support::config("alarm.{$group}");
    }

    public function process(object $event) {
        if ($event instanceof MessageEventInterface){
            $cfg = $this->getGroupConfig($event->getGroup());
            if (!empty($cfg) && !empty($cfg['handler'])){
                $handler = $this->handlerFactory->getHandler($cfg['handler']);
                $handler->send($event->getContent(), $cfg);
            }
        }
    }

}