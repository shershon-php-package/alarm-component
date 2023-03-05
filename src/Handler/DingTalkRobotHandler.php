<?php


namespace Shershon\Alarm\Handler;


/**
 * Class DingTalkRobotHandler
 * @package Shershon\Hyperf\Alarm\Handler
 */
class DingTalkRobotHandler extends AbstractMessageHandler  {

    public function send(string $content, array $cfg): bool {
        $msg = $this->formatContent($content);
        $accessToken = $cfg['access_token'];
        $secret = $cfg['secret'] ?? '';
        $listMobile = $cfg['at_mobiles'] ?? [];
        $listUserId = $cfg['at_users'] ?? [];
        $isAtAll = $cfg['is_at_all'] ?? false;

        return $this->factory->getDingTalkService()->robotSendText($accessToken, $msg, $listMobile, $listUserId, $isAtAll, $secret);
    }

}