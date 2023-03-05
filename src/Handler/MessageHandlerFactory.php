<?php


namespace Shershon\Alarm\Handler;


use Exception;
use Psr\Container\ContainerInterface;
use Shershon\Alarm\Contract\MessageHandlerInterface;

/**
 * Class MessageHandlerFactory
 * @package Shershon\Hyperf\Alarm\Service
 */
class MessageHandlerFactory {

    /**
     * @var array
     */
    protected $mapHandler = [
        'dingtalk-chat' => DingTalkChatHandler::class,
        'dingtalk-robot' => DingTalkRobotHandler::class,
        'wechat-work' => WechatWorkHandler::class,
    ];

    /**
     * MessageHandlerFactory constructor.
     * @param ContainerInterface $container
     * @throws Exception
     */
    public function __construct(ContainerInterface $container) {
        foreach($this->mapHandler as $name => $class){
            $this->mapHandler[$name] = $container->get($class);
        }
    }

    /**
     * @param $name
     * @return MessageHandlerInterface|null
     */
    public function getHandler($name):?MessageHandlerInterface{
        if (isset($this->mapHandler[$name]) && $this->mapHandler[$name] instanceof MessageHandlerInterface){
            return $this->mapHandler[$name];
        }
        return null;
    }

}