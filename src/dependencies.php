<?php

use Shershon\Alarm\Contract\FactoryInterface;
use Shershon\Alarm\Contract\MessageEventInterface;
use Shershon\Alarm\Factory;
use Shershon\Common\Util\Support;

Support::setDefaultDependent(FactoryInterface::class, Factory::class);

Support::listenerRegister(MessageEventInterface::class, "Shershon\Alarm\Listener\MessageEventListener@process");