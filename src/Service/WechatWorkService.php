<?php


namespace Shershon\Alarm\Service;


/**
 * 企业微信
 * Class WechatWorkService
 * @package Shershon\Hyperf\Alarm\Service
 */
class WechatWorkService extends BaseService {

    const API_CHAT_MESSAGE = '/cgi-bin/appchat/send';

    const ERRNO_OK = 0;

    protected function getBaseUrl(){
        return $this->factory->config("api.wechat_work.base_url", "https://qyapi.weixin.qq.com");
    }

    protected function checkRet(array $ret):bool {
        return ($ret['errcode'] ?? -1) == self::ERRNO_OK;
    }

    public function sendChatMarkdownMessage(string $accessToken, $chatId, string $content):bool {
        $content = [
            "chatid" => $chatId,
            "msgtype" => "markdown",
            "markdown" => [
                'content' => $content,
            ],
        ];

        $ret = $this->client->postJson($this->getBaseUrl() . self::API_CHAT_MESSAGE, [
            'access_token' => $accessToken,
        ], $content);

        return $this->checkRet($ret);
    }

}