<?php


namespace Shershon\Alarm\Contract;


interface MessageEventInterface {

    /**
     * @return string
     */
    public function getContent();

    /**
     * @return string
     */
    public function getGroup();

}