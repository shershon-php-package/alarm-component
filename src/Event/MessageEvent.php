<?php


namespace Shershon\Alarm\Event;

use Shershon\Alarm\Contract\MessageEventInterface;

class MessageEvent implements MessageEventInterface {

    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    protected $group;

    public function __construct(string $content, string $group = 'default') {
        $this->content = $content;
        $this->group = $group;
    }

    /**
     * @return string
     */
    public function getContent():string {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getGroup(): string {
        return $this->group;
    }

}