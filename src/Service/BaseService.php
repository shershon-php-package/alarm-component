<?php


namespace Shershon\Alarm\Service;


use Shershon\Alarm\Contract\FactoryInterface;

class BaseService {

    /**
     * @var FactoryInterface
     */
    protected $factory;

    /**
     * @var Client
     */
    protected $client;

    public function __construct(FactoryInterface $factory) {
        $this->factory = $factory;
        $this->client = $factory->getApiClient();
    }

}