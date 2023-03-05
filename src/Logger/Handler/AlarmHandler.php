<?php


namespace Shershon\Alarm\Logger\Handler;


use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use Psr\EventDispatcher\EventDispatcherInterface;
use Shershon\Alarm\Event\AlarmEvent;
use Shershon\Common\Util\Support;

class AlarmHandler extends AbstractProcessingHandler {

    protected $group = 'default';

    public function __construct($level = Logger::ERROR, bool $bubble = true, string $group = 'default') {
        parent::__construct($level, $bubble);
        $this->group = $group;
    }

    protected function getEventDispatcher():EventDispatcherInterface{
        return Support::getFactory()->getEventDispatcher();
    }

    protected function write(array $record): void {
        $this->getEventDispatcher()->dispatch(new AlarmEvent(
            "异常日志报警: " . $record['level'],
            "错误日志内容: " . $record['formatted'],
            null,
            is_array($record["context"]) ? json_encode($record['context'], JSON_UNESCAPED_UNICODE) : ($record['context'] ?? null),
            $record['request_id'] ?? null,
            $this->group
        ));
    }

}