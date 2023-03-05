<?php


namespace Shershon\Alarm\Traits;


use Shershon\Alarm\Service\Client;
use Shershon\Alarm\Service\DingTalkService;
use Shershon\Alarm\Service\OfficialService;
use Shershon\Alarm\Service\WechatWorkService;

trait AlarmFactoryTrait {

    public function getApiClient() {
        return $this->getContainer()->get(Client::class);
    }

    public function getOfficialService() {
        return $this->getContainer()->get(OfficialService::class);
    }

    public function getWechatWorkService() {
        return $this->getContainer()->get(WechatWorkService::class);
    }

    public function getDingTalkService() {
        return $this->getContainer()->get(DingTalkService::class);
    }

}