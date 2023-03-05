<?php


namespace Shershon\Alarm\Http;


use Psr\Http\Message\ResponseInterface;
use Shershon\Common\Http\ClientWrapper;

class AlarmClientWrapper extends ClientWrapper
{

    protected function parseResponse(ResponseInterface $resp)
    {
        if ($resp->getStatusCode() != '200'){
            return "";
        }
        // auto decode
        $body = (string)$resp->getBody();
        $this->logger->debug("====REQUEST SUCCESS!====RESP====" . $body);
        return $body;
    }

}