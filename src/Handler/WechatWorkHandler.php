<?php


namespace Shershon\Alarm\Handler;

/**
 * Class WechatWorkHandler
 * @package Shershon\Hyperf\Alarm\Handler
 */
class WechatWorkHandler extends AbstractMessageHandler {

    public function send(string $content, array $cfg): bool {
        $msg = $this->formatContent($content);

        $appId = $cfg['appid'];
        $chatId = $cfg['chat_id'];

        $accessToken = $this->factory->getOfficialService()->getWechatAccessToken($appId);

        return $this->factory->getWechatWorkService()->sendChatMarkdownMessage($accessToken, $chatId, $msg);
    }

}