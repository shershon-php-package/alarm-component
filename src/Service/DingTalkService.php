<?php


namespace Shershon\Alarm\Service;

use Shershon\Alarm\Contract\FactoryInterface;

/**
 * Class DingTalkService
 * 对接钉钉
 * @package Shershon\Hyperf\Alarm\Service
 */
class DingTalkService extends BaseService {

    const API_ROBOT_SEND = '/robot/send';

    const API_CHAT_SEND = '/chat/send';

    const ERRNO_OK = 0;

    protected function getBaseUrl(){
        return $this->factory->config("api.dingtalk.base_url", "https://oapi.dingtalk.com");
    }

    protected function checkRet(array $ret):bool {
        return ($ret['errcode'] ?? -1) == self::ERRNO_OK;
    }

    /**
     * 机器人发送文本消息
     * @param string $accessToken
     * @param string $content
     * @param array $atMobiles
     * @param array $atUsers
     * @param bool $isAtAll
     * @param string $secret
     * @return bool
     */
    public function robotSendText(string $accessToken, string $content, array $atMobiles = [], array $atUsers = [], bool $isAtAll = false, string $secret = ''):bool {
        $url = $this->getBaseUrl() . static::API_ROBOT_SEND;
        $query = [
            'access_token' => $accessToken,
        ];

        if (empty($secret)){
            $query['timestamp'] = round(microtime(true) * 1000);
            $str2Sign = $query['timestamp'] . "\n" . $secret;
            $hashString = hash_hmac('sha256', $str2Sign, $secret);
            $query['sign'] = urlencode(base64_encode($hashString));
        }

        $at = [];
        !empty($atMobiles)
            && $at['atMobiles'] = $atMobiles
            && $content .= " " . implode(",", array_map(function ($row){
                    return "@" . $row;
                }, $atMobiles));

        !empty($atUsers) && $at['atUserIds'] = $atUsers;
        !$isAtAll && $at['isAtAll'] = !!$isAtAll;

        $body = [
            'msgtype' => 'text',
            'text' => $content,
        ];
        !empty($at) && $body['at'] = $at;
        $ret = $this->client->postJson($url,$query, $body);

        return $this->checkRet($ret);
    }

    /**
     * 发送群文本消息
     * @param string $accessToken
     * @param string $chatId
     * @param string $content
     * @return bool
     */
    public function chatSendText(string $accessToken, string $chatId, string $content):bool {
        $url = $this->getBaseUrl() . static::API_CHAT_SEND;

        $query = [
            'access_token' => $accessToken,
        ];

        $body = [
            'chatid' => $chatId,
            'msg' => [
                'msgtype' => 'text',
                'text' => [
                    'content' => $content,
                ],
            ],
        ];

        $ret = $this->client->postJson($url, $query, $body);

        return $this->checkRet($ret);
    }
}