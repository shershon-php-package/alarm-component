<?php

namespace Shershon\AlarmTest;

use PHPUnit\Framework\TestCase;
use Shershon\Alarm\Handler\MessageHandlerFactory;

class AlarmTest extends TestCase
{
    public function testWechat()
    {
        $content        = '
        管理小课(PHP)
> 简述: 异常日志报警: 400
> 时间: <font color="warning">2023-03-05 04:29:09</font>
> 详情: <font color="warning">错误日志内容: [2023-03-05T04:29:09.527051+00:00] wm.ERROR: module:message {"title":"this is test"} []
</font>
> 代码: `{"title":"this is test"}`
';
        $cfg            = [
            "handler" => "wechat-work",
            "title"   => "管理小课(PHP)",
            "chat_id" => "GLKTestWarning",
            "appid"   => "xiaobai-alarm"
        ];
        // todo
        $handlerFactory = new MessageHandlerFactory();
        $handler        = $handlerFactory->getHandler('wechat-work');
        $handler->send($content, $cfg);
    }
}