<?php


namespace Shershon\Alarm\Service;

use Shershon\Alarm\Contract\FactoryInterface;
use Shershon\Common\Client\Traits\JsonClientTrait;
use Shershon\Common\Service\Contract\ResponseHandlerInterface;

/**
 * Class Client
 * @package Shershon\Hyperf\Alarm\Service
 */
class Client implements ResponseHandlerInterface {

    use JsonClientTrait {
        __construct as private traitConstruct;
    }

    public function __construct(FactoryInterface $factory) {
        $this->traitConstruct($factory);
    }

    public function handleResponse($response)
    {
        $d = json_decode($response, true);
        if (json_last_error() == JSON_ERROR_NONE){
            return $d;
        }
        return [];
    }

}