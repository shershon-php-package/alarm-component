<?php


namespace Shershon\Alarm\Handler;

use Shershon\Alarm\Contract\FactoryInterface;
use Shershon\Alarm\Contract\MessageHandlerInterface;

abstract class AbstractMessageHandler implements MessageHandlerInterface {

    /**
     * @var FactoryInterface
     */
    protected $factory;

    public function __construct(FactoryInterface $factory) {
        $this->factory = $factory;
    }

    protected function formatContent(string $content):string {
        $app = $this->factory->config('app_name');
        $env = $this->factory->config('app_env');

        return sprintf("[%s.%s] %s", $env, $app, $content);
    }

}