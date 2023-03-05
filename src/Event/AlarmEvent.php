<?php


namespace Shershon\Alarm\Event;


use Shershon\Common\Factory\SimpleFactory;

class AlarmEvent extends MessageEvent {

    public function __construct(string $summary, string $description, ?string $extra = null, ?string $code = null, ?string $requestId = null, string $group = 'default') {
        parent::__construct($this->buildContent($summary, $description, $extra, $code, $requestId, $group), $group);
    }

    protected function buildContent(string $summary, string $description, ?string $extra = null, ?string $code = null, ?string $requestId = null, string $group = 'default'){
        $title = $this->getTitle($group);
        $parts = [
            "> 简述: $summary",
            "> 时间: <font color=\"warning\">" . date("Y-m-d H:i:s") . "</font>",
        ];
        is_null($requestId) or $parts[] = "> REQUEST_ID: <font color=\"info\">{$requestId}</font>";
        $parts[] = "> 详情: <font color=\"warning\">{$description}</font>";
        is_null($extra) or $parts[] = "> \t" . str_replace("\n", "\n> \t", $extra);
        is_null($code) or $parts[] = "> 代码: `" . str_replace("\n", "\n\t", $code) . "`";
        return $title . "\n" . implode("\n>\n", $parts);
    }

    protected function getTitle($group){
        return SimpleFactory::instance()->config("alarm.$group.title", "");
    }

}