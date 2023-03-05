<?php


namespace Shershon\Alarm\Contract;

use Shershon\Alarm\Service\Client;
use Shershon\Alarm\Service\DingTalkService;
use Shershon\Alarm\Service\OfficialService;
use Shershon\Alarm\Service\WechatWorkService;
use Shershon\Common\Factory\Contract\FactoryInterface as WmFactoryInterface;


interface FactoryInterface extends WmFactoryInterface {

    /**
     * @return Client
     */
    public function getApiClient();

    /**
     * @return OfficialService
     */
    public function getOfficialService();

    /**
     * @return WechatWorkService
     */
    public function getWechatWorkService();

    /**
     * @return DingTalkService
     */
    public function getDingTalkService();

}