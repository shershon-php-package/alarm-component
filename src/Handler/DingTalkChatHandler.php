<?php


namespace Shershon\Alarm\Handler;


/**
 * Class DingTalkChatHandler
 * @package Shershon\Hyperf\Alarm\Handler
 */
class DingTalkChatHandler extends AbstractMessageHandler {

    public function send(string $content, array $cfg): bool {
        $msg = $this->formatContent($content);
        $appkey = $cfg['appkey'];
        $chatId = $cfg['chat_id'];

        $accessToken = $this->factory->getOfficialService()->getDingTalkAccessToken($appkey);

        return $this->factory->getDingTalkService()->chatSendText($accessToken, $chatId, $msg);
    }

}