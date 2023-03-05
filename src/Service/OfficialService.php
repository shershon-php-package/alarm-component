<?php


namespace Shershon\Alarm\Service;


class OfficialService extends BaseService {

    const API_DINGTALK_ACCESS_KEY = '/api/dingtalk/access_keys';

    const API_WECHAT_ACCESS_KEY = '/api/app/access_keys';

    protected function getBaseUrl(){
        return $this->factory->config("api.official.base_url", "http://internal-official.weimiaocaishang.com");
    }

    /**
     * @param string $appkey
     * @return string
     */
    public function getDingTalkAccessToken(string $appkey):string{
        $resp = $this->client->get($this->getBaseUrl() . static::API_DINGTALK_ACCESS_KEY, [
            'appkey' => $appkey,
        ]);
        return $resp['data']['access_token'] ?? '';
    }

    /**
     * @param string $appId
     * @return string
     */
    public function getWechatAccessToken(string $appId):string{
        $resp = $this->client->get($this->getBaseUrl() . static::API_WECHAT_ACCESS_KEY, [
            'appid' => $appId,
        ]);
        return $resp['data']['access_token'] ?? '';
    }

}