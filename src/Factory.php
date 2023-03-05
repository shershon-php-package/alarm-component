<?php


namespace Shershon\Alarm;


use Shershon\Alarm\Contract\FactoryInterface;
use Shershon\Alarm\Traits\AlarmFactoryTrait;
use Shershon\Common\Factory\SimpleFactory;

class Factory extends SimpleFactory implements FactoryInterface {

    use AlarmFactoryTrait;

}