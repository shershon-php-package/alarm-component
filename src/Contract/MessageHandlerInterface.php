<?php


namespace Shershon\Alarm\Contract;


interface MessageHandlerInterface {

    /**
     * @param string $content
     * @param array $cfg
     * @return bool
     */
    public function send(string $content, array $cfg):bool;

}